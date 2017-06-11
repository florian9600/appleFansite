<?php

function get_db()
{
    $mongo = new MongoClient(
        "mongodb://localhost:27017/",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
            'db' => 'wai',
        ]);

    $db = $mongo->wai;

    return $db;
}

function register($data)
{
    $db = get_db();

    $errors = [];
    $success = true;

    if($data['password'] != $data['password_repeat']) {
        $errors[] = 'diff_pass';
        $success = false;
    }

    $query = ['login' => $data['login']];
    $check_login = $db->accounts->find($query);
    if($check_login->count() != 0) {
        $errors[] = 'exist_login';
        $success = false;
    }

    $query = ['email' => $data['email']];
    $check_email = $db->accounts->find($query);
    if($check_email->count() != 0) {
        $errors[] = 'exist_email';
        $success = false;
    }

    if($success) {
        $account = [
            'login' => $data['login'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'email' => $data['email'],
        ];

        $db->accounts->insert($account);
    }

    return $errors;
}

function login($data)
{
    $db = get_db();

    $errors = [];
    $success = true;

    $query = ['login' => $data['login']];
    $check = $db->accounts->findOne($query);
    if($check === null || !password_verify($data['password'], $check['password'])) {
        $errors[] = 'wrong_login_or_password';
        $success = false;
    }

    if($success) {
        $_SESSION['user_id'] = $check['_id'];
    }

    return $errors;
}

function all_users()
{
    $db = get_db();
    return $db->accounts->find();
}

function get_photos($id = 0, $title = '')
{
    $db = get_db();

    $query['$or'][] = ['photo_private' => 'false'];
    $query['$or'][] = ['owner_id' => $id];

    if($title != '') {
        $query['photo_title'] = new MongoRegex("/$title/i");
    }

    return $db->photos->find($query);
}

function get_login($id)
{

    $db = get_db();

    $query = [
        '_id' => new MongoId($id)
    ];

    $user = $db->accounts->findOne($query);

    return $user['login'];
}

function upload_photo($data)
{
    $errors = [];
    $success = true;

    $file = $data['photo_file'];

    if($file['size'] > 1048576) {
        $errors[] = 'file_too_big';
        $success = false;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_name = $file['tmp_name'];
    $mime_type = finfo_file($finfo, $file_name);

    $type_exstension = '';
    $type_imagecreatefromtype = '';
    $type_imagetype = '';

    if ($mime_type === 'image/jpeg') {
        $type_exstension = '.jpg';
        $type_imagecreatefromtype = 'imagecreatefromjpeg';
        $type_imagetype = 'imagejpeg';
    } else if ($mime_type === 'image/png') {
        $type_exstension = '.png';
        $type_imagecreatefromtype = 'imagecreatefrompng';
        $type_imagetype = 'imagepng';
    } else {
        $errors[] = 'file_wrong_type';
        $success = false;
    }

    if($success) {

        $db = get_db();

        $upload_dir = getcwd() . '/images/';
        $target = '';
        do {
            $upload_name = random_str(10);
            $target = $upload_dir . $upload_name;
        } while (file_exists($target . $type_exstension));

        move_uploaded_file($file['tmp_name'], $target . $type_exstension);

        $imgSize = getimagesize($target . $type_exstension);

        $imgWidth = $imgSize[0];
        $imgHeight = $imgSize[1];

        $imgWatermark = imagecreatetruecolor($imgWidth, $imgHeight);
        $imgResize = imagecreatetruecolor($imgWidth, $imgHeight);

        $imgSource = $type_imagecreatefromtype($target . $type_exstension);

        imagecopy($imgWatermark, $imgSource, 0, 0, 0, 0, $imgWidth, $imgHeight);
        imagecopy($imgResize, $imgSource, 0, 0, 0, 0, $imgWidth, $imgHeight);

        $iTextColor = imagecolorallocate($imgWatermark, 0, 0, 0);
        imagestring($imgWatermark, 5, 0, 0, $data['photo_watermark'], $iTextColor);

        $imgResize = imagescale($imgResize, 200, 125);

        $type_imagetype($imgWatermark, $target . "_watermark" . $type_exstension);
        $type_imagetype($imgResize, $target . "_resized" . $type_exstension);

        imagedestroy($imgWatermark);
        imagedestroy($imgResize);

        $photo = [
            'photo_id' => $upload_name,
            'photo_type' => $type_exstension,
            'photo_title' => $data['photo_title'],
            'photo_author' => $data['photo_author'],
            'photo_private' => $data['photo_private']
        ];

        if (isset($data['owner_id'])) {
            $photo['owner_id'] = $data['owner_id'];
        } else {
            $photo['owner_id'] = 0;
        }

        $db->photos->insert($photo);
    }

    return $errors;
}

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[rand(0, $max)];
    }
    return $str;
}
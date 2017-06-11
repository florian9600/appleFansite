<?php
require_once 'business.php';
require_once 'controller_utils.php';

function glowna(&$model)
{
    $model['page_name'] = 'glowna';

    return 'template';
}

function imac(&$model)
{
    $model['page_name'] = 'imac';

    return 'template';
}

function macbook(&$model)
{
    $model['page_name'] = 'macbook';

    return 'template';
}

function macpro(&$model)
{
    $model['page_name'] = 'macpro';

    return 'template';
}

function iphone(&$model)
{
    $model['page_name'] = 'iphone';

    return 'template';
}

function ipad(&$model)
{
    $model['page_name'] = 'ipad';

    return 'template';
}

function rekrutacja(&$model)
{
    $model['page_name'] = 'rekrutacja';

    return 'template';
}

function galeria(&$model)
{
    $model['page_name'] = 'galeria';

    if($model['is_logged']) {
        $id = $_SESSION['user_id'];
    } else {
        $id = 0;
    }

    $model['photos'] = get_photos($id);

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['photo_favorite'])) {
        $_SESSION['photo_favorite'] = [];
        foreach ($_POST['photo_favorite'] as $fav) {
            $_SESSION['photo_favorite'][] = $fav;
        }
    }

    return 'template';
}

function galeria_ulubione(&$model)
{
    $model['page_name'] = 'galeria_ulubione';

    if($model['is_logged']) {
        $id = $_SESSION['user_id'];
    } else {
        $id = 0;
    }

    $model['photos'] = get_photos($id);

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['photo_favorite']) && isset($_SESSION['photo_favorite'])) {
        foreach ($_POST['photo_favorite'] as $fav) {
            $i = 0;
            foreach ($_SESSION['photo_favorite'] as $sess) {
                if ($fav == $sess) {
                    $_SESSION['photo_favorite'][$i] = 'del';
                }
                $i++;
            }
        }
    }

    return 'template';
}

function galeria_szukaj_script(&$model)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (is_ajax()) {

            if($model['is_logged']) {
                $id = $_SESSION['user_id'];
            } else {
                $id = 0;
            }

            $model['photos'] = get_photos($id, $_POST['title']);

            return galeria_wyszukane($model);

        } else {
            return 'redirect:' . $_SERVER['HTTP_REFERER'];
        }
    }
}

function galeria_wyszukane(&$model)
{
    return 'fragments/galeria_wyszukane';
}

function galeria_szukaj(&$model)
{
    $model['page_name'] = 'galeria_szukaj';
    return 'template';
}

function zdjecie(&$model)
{
    $model['page_name'] = 'zdjecie';

    return 'template';
}

function rejestracja(&$model)
{
    $model['page_name'] = 'rejestracja';

    if($_SERVER['REQUEST_METHOD']==='POST') {
        if(
            !empty($_POST['register_login']) &&
            !empty($_POST['register_password']) &&
            !empty($_POST['register_password_repeat']) &&
            !empty($_POST['register_email'])
        ){

            $data = [
                'login' => $_POST['register_login'],
                'password' => $_POST['register_password'],
                'password_repeat' => $_POST['register_password_repeat'],
                'email' => $_POST['register_email'],
            ];

            $errors = register($data);
        } else {
            $errors[] = "not_all_fields_filled";
        }

        $get = "?";

        if(count($errors) != 0) {
            $get .= "register_success=false";
            foreach ($errors as $error) {
                $get .= "&register_errors[]=" . $error;
            }
        } else {
            $get .= "register_success=true";
        }

        return "redirect: rejestracja" . $get;
    }

    return 'template';
}

function logowanie(&$model)
{
    if(
        $_SERVER['REQUEST_METHOD']==='POST' &&
        !empty($_POST['einloggen_login']) &&
        !empty($_POST['einloggen_password'])
    ){

        $data = [
            'login' => (string)$_POST['einloggen_login'],
            'password' => (string)$_POST['einloggen_password'],
        ];

        $errors = login($data);
    } else {
        $errors[] = "not_all_fields_filled";
    }

    $get = "?";

    if(count($errors) != 0) {
        $get .= "einloggen_success=false";
        foreach ($errors as $error) {
            $get .= "&einloggen_errors[]=" . $error;
        }
    } else {
        $get .= "einloggen_success=true";
    }

    $redirect = $_GET['redirect'];

    return "redirect: " . $redirect . $get;
}

function wylogowanie(&$model)
{
    session_destroy();

    $redirect = $_GET['redirect'];

    return "redirect: " . $redirect;
}

function nowe_zdjecie(&$model)
{
    $model['page_name'] = 'nowe_zdjecie';
    if($_SERVER['REQUEST_METHOD']==='POST') {
        if(
            !empty($_POST['photo_title']) &&
            !empty($_POST['photo_author']) &&
            !empty($_POST['photo_watermark']) &&
            $_FILES['photo_file']['tmp_name'] != ""
        ){

            $data = [
                'photo_title' => $_POST['photo_title'],
                'photo_author' => $_POST['photo_author'],
                'photo_watermark' => $_POST['photo_watermark'],
                'photo_file' => $_FILES['photo_file'],
            ];

            if($model['is_logged'] && isset($_POST['photo_private'])) {
                $data['photo_private'] = $_POST['photo_private'];
                $data['owner_id'] = $_SESSION['user_id'];
            } else {
                $data['photo_private'] = 'false';
            }

            $errors = upload_photo($data);
        } else {
            $errors[] = "not_all_fields_filled";
        }

        $get = "?";

        if(count($errors) != 0) {
            $get .= "upload_success=false";
            foreach ($errors as $error) {
                $get .= "&upload_errors[]=" . $error;
            }
        } else {
            $get .= "upload_success=true";
        }

        return "redirect: nowe_zdjecie" . $get;
    }

    return 'template';
}
<?php

const REDIRECT_PREFIX = 'redirect:';

function dispatch($routing, $action_url, $model = [])
{
    $controller_name = $routing[$action_url];

    $model['controller_name'] = $controller_name;

    $model['is_logged'] = false;
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
        $model['is_logged'] = true;
        $model['user_login'] = get_login($_SESSION['user_id']);
    }


    $view_name = $controller_name($model);

    build_response($view_name, $model);
}

function build_response($view, $model)
{
    if (strpos($view, REDIRECT_PREFIX) === 0) {
        $url = substr($view, strlen(REDIRECT_PREFIX));
        header("Location: " . $url);
        exit;

    } else {
        render($view, $model);
    }
}

function render($view_name, $model)
{
    global $routing;
    extract($model);
    
    include 'views/' . $view_name . '.php';
}

function is_ajax()
{
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

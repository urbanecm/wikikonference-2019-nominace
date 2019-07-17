<?php
$config = yaml_parse('config.yaml');
$id = htmlspecialchars($_GET['id']);
$token = htmlspecialchars($_GET['token']);

if (md5($config['secret'] . $id) == $token) {
    echo(file_get_contents("responses/$id.html"));
} else {
    header('HTTP/1.0 403 Forbidden');
    die('You are not allowed to do this.');
}
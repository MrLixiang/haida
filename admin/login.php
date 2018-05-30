<?php
session_start();
header('Content-type:text/html;charset=utf-8');
include_once 'dbConfig.php';
include_once 'common.php';

if ($_GET) {
    $msg = ['msg' => 'get request', 'status' => 1];
    echo json_encode($msg);
    exit();
}
if ($_POST) {
    if (isset($_POST['postType']) && $_POST['postType'] == 'login') {
        $username = $_POST['username'];
        $psw = md5($_POST['password']);
        $selectSql = 'SELECT * FROM ywc_users WHERE username="' . $username . '"';
        $arr = selectQuery($selectSql);
        if (!$arr) {
            $msg = ['msg' =>' 您还未注册', 'status' => 2];
            responseEvent($msg);
        }
        if($arr[0]['password'] == $psw){
            $msg = ['msg' =>"登录成功", 'status' => 1];
            $_SESSION['loginUserName'] = $username;
            responseEvent($msg);
        }else{
            $msg = ['msg' =>' 密码错误', 'status' => 0];
            responseEvent($msg);
        }


    }
}
$msg = ['msg' => 'other request', 'status' => 1];
responseEvent($msg);
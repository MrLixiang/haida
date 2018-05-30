<?php
header('Content-type:text/html;charset=utf-8');
include_once 'dbConfig.php';
include_once 'common.php';

if ($_GET) {
    $msg = ['msg' => 'get request', 'status' => 1];
    echo json_encode($msg);
    exit();
}
if ($_POST) {
    if (isset($_POST['postType']) && $_POST['postType'] == 'register') {
        $username = $_POST['username'];
        $psw = md5($_POST['password']); //md5加密成32位字符串
        $login_time = time() * 1000;

        $selectSql = 'SELECT * FROM ywc_users WHERE username="' . $username . '"';
        $arr = selectQuery($selectSql);
        if (count($arr) > 0) {
            $msg = ['msg' => $username . ' 已注册！', 'status' => 2];
            responseEvent($msg);
        }

        $insertSql = 'INSERT INTO ywc_users (username, password, login_time) VALUES ("' . $username . '","' . $psw . '","' . $login_time . '")';
        if ($link->query($insertSql)) {
            $msg = ['msg' => '注册成功！', 'status' => 1];
            responseEvent($msg);
        } else {
            $msg = ['msg' => '注册失败！', 'status' => 01];
            responseEvent($msg);
        }
    }
}

$msg = ['msg' => 'other request', 'status' => 1];
responseEvent($msg);

<?php
session_start();
header('Content-type: text/html;charset = utf-8');

include_once 'dbConfig.php';
include_once 'common.php';

if ($_GET) {
    if (isset($_GET['getType']) && $_GET['getType'] === 'checkLogin') {
        if(checkLogin()){
            $username = $_SESSION['loginUserName'];
            $msg = ['msg' => $username, 'status' => 1];
            responseEvent($msg);
        }else{
            $msg = ['msg' => ' 您还未登录', 'status' => 0];
            responseEvent($msg);
        }
        
    }
}
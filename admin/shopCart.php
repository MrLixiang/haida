<?php
header('Content-type=text/html;charset=utf-8');
session_start();//开启session服务
include_once 'dbConfig.php';
include_once 'common.php';

if ($_GET) {
    if (isset($_GET['getType']) && $_GET['getType'] === 'getShopcart') {
        if (checkLogin()) {
            $username = $_SESSION['loginUserName'];
            $selectSql = 'select p.*,s.num,s.id as shopcart_id  from ywc_shopcart as s JOIN ywc_products as p on s.pro_id=p.id where  s.status=1 and s.username="' . $username . '"';
            $res = selectQuery($selectSql);
            responseEvent($res);
        } else {
            $msg = ['msg' => '请登录!', 'status' => 0];
            responseEvent($msg);
        }

    }
}

if($_POST){
    if(isset($_POST['postType']) && $_POST['postType'] ==='changeNum'){
        $updateSql = 'update ywc_shopcart set num='.$_POST['num'].' where id ='.$_POST['id'];
        if($link->query($updateSql)){
            $msg = ['msg' => '修改成功!', 'status' => 1];
        }else{
            $msg = ['msg' => '修改失败!', 'status' => 1];
        }
        responseEvent($msg);
    }

    if(isset($_POST['postType']) && $_POST['postType'] ==='submit'){
        $idStr = $_POST['idStr'];
        $username = $_SESSION['loginUserName'];
        $updateSql = 'update ywc_shopcart set status=2 where id in '.$idStr;
        if($link->query($updateSql)){
            $msg = ['msg' => '提交成功!', 'status' => 1];
        }else{
            $msg = ['msg' => '网络错误请重试!', 'status' => 0];
        }
        responseEvent($msg);
    }
    
}
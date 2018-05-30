<?php

header('Content-type=text/html;charset=utf-8');
session_start();//开启session服务
include_once 'dbConfig.php';
include_once 'common.php';

if($_GET){

    if(isset($_GET['getType']) && $_GET['getType'] === 'confirmById'){
        $id = $_GET['conId'];
        if (checkLogin()) {
            $sql = 'select * from ywc_products where id = '.$id;
            $res = selectQuery($sql);
            if(count($res)>0){
                responseEvent($res);
            }
        }else{
            $msg = ['msg' => '请登录!', 'status' => 0];
            responseEvent($msg);
        }
    }

    if(isset($_GET['getType']) && $_GET['getType'] === 'confirmByShopCartId'){
        if (checkLogin()) {
            $username = $_SESSION['loginUserName'];
            $selectSql = 'select p.*,s.num,s.id as shopcart_id  from ywc_shopcart as s JOIN ywc_products as p on s.pro_id=p.id where  s.status=2 and s.username="' . $username . '"';
            $res = selectQuery($selectSql);
            if (count($res) > 0) {
                $index = count($res) - 1;
                $res = $res[$index];
                array_push($arr,$res);
                responseEvent($arr);
            }
        }else{
            $msg = ['msg' => '请登录!', 'status' => 0];
            responseEvent($msg);
        }
    }

    if(isset($_GET['getType']) && $_GET['getType'] === 'getOrderByID'){
        if (checkLogin()) {
            $username = $_SESSION['loginUserName'];
            $id = $_GET['id'];
            $selectSql = 'select p.*,s.num,s.id as shopcart_id  from ywc_shopcart as s JOIN ywc_products as p on s.pro_id=p.id where s.username="' . $username . '" and  s.status = 2';
            $res = selectQuery($selectSql);
            if (count($res) > 0) {
                responseEvent($res);
            }
        }else{
            $msg = ['msg' => '请登录!', 'status' => 0];
            responseEvent($msg);
        }
    }

    if(isset($_GET['getType']) && $_GET['getType'] === 'getOrder'){
        if (checkLogin()) {
            $username = $_SESSION['loginUserName'];
            $selectSql = 'select p.*,s.num,s.id as shopcart_id  from ywc_shopcart as s JOIN ywc_products as p on s.pro_id=p.id where  s.status=2 and s.username="' . $username . '"';
            $res = selectQuery($selectSql);
            if (count($res) > 0) {
                responseEvent($res);
            }
        }else{
            $msg = ['msg' => '请登录!', 'status' => 0];
            responseEvent($msg);
        }
    }
}
if($_POST){
    if(isset($_POST['postType']) && $_POST['postType'] ==='orderSubmit'){
        $updateSql = 'update ywc_shopcart set status = 3 where id in '.$_POST['idStr'];
        if($link->query($updateSql)){
            $msg = ['msg' => '成功!', 'status' => 1];
        }else{
            $msg = ['msg' => '失败!', 'status' => 0];
        }
        responseEvent($msg);
    }
    if(isset($_POST['postType']) && $_POST['postType'] ==='addOrderById'){
        $username = $_SESSION['loginUserName'];
        $proId = $_POST['proId'];
        $num = $_POST['num'];
        $price = $_POST['price'];
        $add_time = time() * 1000;
        $insertSql = 'INSERT INTO ywc_shopcart(username, pro_id, num, price, status, add_time) VALUES ("'.$username.'",'.$proId.','.$num.','.$price.',2,"'.$add_time.'")';
        if($link->query($insertSql)){
            $msg = ['msg' => '成功!', 'status' => 1];
        }else{
            $msg = ['msg' => '失败!', 'status' => 0];
        }
        responseEvent($msg);
    }

    if(isset($_POST['postType']) && $_POST['postType'] ==='init'){
        $idStr = $_POST['idStr'];
        $username = $_SESSION['loginUserName'];
        $updateSql = 'update ywc_shopcart set status=4 where id in '.$idStr;
        $link->query($updateSql);
    }

}
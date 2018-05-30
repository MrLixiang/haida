<?php
session_start();
header('Content-type: text/html;charset = utf-8');

include_once 'dbConfig.php';
include_once 'common.php';

if ($_GET) {
    if (isset($_GET['getType']) && $_GET['getType'] === 'getDetail') {
        $id = $_GET['id'];
        $selectSql = 'select * from ywc_products where id =' . $id;
        $res = selectQuery($selectSql);
        if (count($res) > 0) {
            responseEvent($res);
        }
    }

}

if ($_POST) {
    if (isset($_POST['postType']) && $_POST['postType'] === 'add') {
        $proId = $_POST['id'];
        $price = $_POST['price'];
        if (checkLogin()) {
            $username = $_SESSION['loginUserName'];
            $add_time = time() * 1000;
            if (checkLogin()) {
                $username = $_SESSION['loginUserName'];
                $selectSql = 'select * from ywc_shopcart where status=1 and username="' . $username . '" and pro_id=' . $proId;
                $res = selectQuery($selectSql);
                if (count($res) > 0) {
                    $num = $res[0]['num'] + 1;
                    $updateSql = 'update ywc_shopcart set num = ' . $num . ' where id=' . $res[0]['id'];
                    if ($link->query($updateSql)) {
                        $msg = ['msg' => '添加成功', 'status' => 1];
                    } else {
                        $msg = ['msg' => '添加失败', 'status' => 0];
                    }
                    responseEvent($msg);
                }
                $insertsql = 'insert into ywc_shopcart (username,pro_id,num,price,add_time) VALUES ("' . $username . '" ,' . $proId . ',1,' . $price . ',"' . $add_time . '")';
                if ($link->query($insertsql)) {
                    $msg = ['msg' => '添加成功', 'status' => 1];
                } else {
                    $msg = ['msg' => '添加失败', 'status' => 0];
                }
                responseEvent($msg);
            }
        } else {
            $msg = ['msg' => ' 您还未登录', 'status' => 5];
            responseEvent($msg);
        }


    }

}

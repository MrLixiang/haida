<?php

function responseEvent($msg)
{
    global $link;
    echo json_encode($msg);
    $link->close();
    exit();
}

function selectQuery($sql)
{
    global $link;
    $res = $link->query($sql); //查询语句与其他几个语句不一样，他的返回值不是boolean,而是对象，需要遍历
    $arr = [];
    while ($item = $res->fetch_assoc()){
        array_push($arr, $item);
    }
    return $arr;
}

function checkLogin()
{
    return isset($_SESSION['loginUserName']);
}
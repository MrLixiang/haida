<?php
header('Content-type:text/html;charset=utf-8');

include_once 'dbConfig.php';
include_once 'common.php';

if ($_GET) {
    if (isset($_GET['getType']) && $_GET['getType'] === 'default') {
        $sql = 'SELECT * FROM ywc_products WHERE 1 LIMIT 0,' . $_GET['num'];
        $res = selectQuery($sql);
        responseEvent($res);
    }

    if (isset($_GET['getType']) && $_GET['getType'] === 'sales') {
        $sql = 'SELECT * FROM ywc_products WHERE 1 ORDER BY sales DESC  LIMIT 0,' . $_GET['num'];
        $res = selectQuery($sql);
        responseEvent($res);
    }

    if (isset($_GET['getType']) && $_GET['getType'] === 'price') {
        $sql = 'SELECT * FROM ywc_products WHERE 1 ORDER BY price DESC  LIMIT 0,' . $_GET['num'];
        $res = selectQuery($sql);
        responseEvent($res);
    }

    if (isset($_GET['getType']) && $_GET['getType'] === 'comment') {
        $sql = 'SELECT * FROM ywc_products WHERE 1 ORDER BY comment DESC  LIMIT 0,' . $_GET['num'];
        $res = selectQuery($sql);
        responseEvent($res);
    }

    if (isset($_GET['getType']) && $_GET['getType'] === 'search') {
        $search = $_GET['search'];
        $sql = 'SELECT * FROM ywc_products WHERE title LIKE "%'.$search.'%" OR subtitle LIKE "%'.$search.'%" LIMIT 0,' . $_GET['num'];
        $res = selectQuery($sql);
        responseEvent($res);
    }
}
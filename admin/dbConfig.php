<?php
header('Content-type:text/html;charset=utf-8');
define('HOST', 'localhost'); //主机名称
define('USER', 'root'); //数据库用户名
define('PSW', ''); //密码
define('DB', 'haida'); //数据库名称

$link = new mysqli(HOST, USER, PSW, DB);
if ($link->connect_error) {
    die('数据库连接失败，具体原因：' . $link->connect_error);
}
mysqli_set_charset($link, 'utf8'); //设置查询语句支持中文
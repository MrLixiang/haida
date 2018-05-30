<?php
//INSERT INTO `haida`.`ywc_products` (`id`, `title`, `subtitle`, `img_src`, `price`, `sales`, `comment`, `add_time`, `status`) VALUES (NULL, '水密码海泉精华化妆品套装冬季补水', '保湿水乳液少女学生护肤品', 'img/zhong1_03.png', '390', '988', '505', '1523515763886', '1');

include_once 'dbConfig.php';

for ($i = 1; $i < 51; $i++) {
    //$insertSql = 'INSERT INTO ywc_products ( title, subtitle, img_src, price, sales, comment, add_time, status) VALUES ("水密码海泉精华化妆品套装冬季补水", "保湿水乳液少女学生护肤品", "img/zhong1_03.png", "390", "988", "505", "1523515763886", "1")';
    $ik = rand(0,11);
    $price = rand(100, 1000);
    $comment = rand(300, 3000);
    $sales = $comment + rand(200, 2000);
    $title = ['深层补水 畅饮水润 让你的肌肤“喝饱”水','在最美的年龄 拒绝加“斑”','魅惑价值 尽享奢华 品味女士的最爱','水密码海泉精华化妆品套装冬季补水','碧欧泉 美白净透修颜防晒隔离乳霜','迪奥高级珠宝','芦荟纯正品天然补水保湿','沁泽天然淡水珍珠耳坠','水密码套装补水保湿水乳三四件套','水密码海泉精华套装正品','希梵尼 天然珍珠项链 ','正品 天然珍珠手链 清新秀气'];
    $subtitle = ['水漾肌蜜三件套','控油“神器”三件套','来自深海的璀璨','保湿水乳液少女学生护肤品','30ml 紫绿蓝白粉','Diorissimo系列项链','祛黄祛痘 淡化痘珍珠粉面膜','18K黄金女 耳钉耳环饰品','滋润少女学生护肤丹姿化妆品','女士冬季补水保湿水乳丹姿护肤品三件套','饱满极强光超大淡水珍珠','精品韩版 近圆无暇女 特价包邮'];
    $imgSrc = ['static/img/home_hot_img.png','static/img/home_boom_img.png','static/img/home_new_img.png','static/img/hua1_03.png','static/img/zhong1_03.png','static/img/zhong2_03.png','static/img/zhong3_03.png','static/img/zhong4_03.png','static/img/shop_cart_img1.png','static/img/shop_cart_img2.png','static/img/shop_cart_img3.png','static/img/shop_cart_img4.png'];
    $add_time = 1523510000000 + rand(0, 9999999);
    $updateSql = 'UPDATE ywc_products SET title="' . $title[$ik] . '",subtitle = "'.$subtitle[$ik].'", img_src="'.$imgSrc[$ik].'",price=' . $price . ', sales=' . $sales . ', comment=' . $comment . ', add_time=' . $add_time . ' WHERE id=' . $i;

   if ($link->query($updateSql)) {
       echo 'sucdasdascess!!<br/>';
   }
}




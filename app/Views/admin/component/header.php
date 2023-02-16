<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= dashboard_css() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= $GLOBALS["domainPage"] ?>/public/lib/aos/aos.css" />
</head>

<body>
    <div class="dashBoard_wrapper">
        <div class="sideBar">
            <a href="<?= $GLOBALS["domainPage"] ?>/"><img src="<?= $GLOBALS["domainPage"] ?>/public/imgs/logo.png"
                    alt="logo"></a>
            <ul class="dashBoard_list">
                <li class="dashBoard_item">
                    <i class="fa-solid fa-table-cells"></i>
                    <a class="" href="<?= $GLOBALS["domainPage"] ?>/admin/">Dashboard</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <a class="" href="<?= $GLOBALS["domainPage"] ?>/admin/productManage">Quản lý sản phẩm</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-universal-access"></i>
                    <a class="" href="<?= $GLOBALS["domainPage"] ?>/users">Quản lý tài khoản</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-calendar-days"></i>
                    <a class="" href="<?= $GLOBALS["domainPage"] ?>/category">Quản lý danh mục</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-comments"></i>
                    <a class="" href="<?= $GLOBALS["domainPage"] ?>/admin_comment">Quản lý bình luận</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-chart-column"></i>
                    <a class="" href="<?= $GLOBALS["domainPage"] ?>/admin_statistical">Thống kê</a>
                </li>
            </ul>
        </div>
<?php
include "../lib/config.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    include "index.php";
} else {
    include "template/header.php";
    include "template/sidebar.php";

    if ($_GET['pages'] == 'home') {
        include "pages/home/home.php";
    } else {
        include "pages/home/home.php";
    }

    include "template/footer.php";
}
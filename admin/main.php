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

    } else if ($_GET['pages'] == 'jenis_order') {
    	include "pages/jenis_order/jenis_order.php";
    } else if ($_GET['pages'] == 'tambah_jenis_order') {
    	include "pages/jenis_order/form_tambah.php";
    } else if ($_GET['pages'] == 'edit_jenis_order') {
    	include "pages/jenis_order/form_edit.php";

    } else if ($_GET['pages'] == 'order') {
        include "pages/order/order.php";
    } else if ($_GET['pages'] == 'tambah_order') {
        include "pages/order/form_tambah.php";
    } else if ($_GET['pages'] == 'edit_order') {
        include "pages/order/form_edit.php";
        
    }  else {
        include "pages/home/home.php";
    }

    include "template/footer.php";
}
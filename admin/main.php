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

    } else if ($_GET['pages'] == 'messages') {
    	include "pages/messages/messages.php";

    } else if ($_GET['pages'] == 'site') {
    	include "pages/site/site.php";
    } else if ($_GET['pages'] == 'edit_site') {
    	include "pages/site/form_edit.php";

    } else if ($_GET['pages'] == 'user') {
    	include "pages/user/user.php";
    } else if ($_GET['pages'] == 'tambah_user') {
    	include "pages/user/form_tambah.php";
    } else if ($_GET['pages'] == 'edit_user') {
    	include "pages/user/form_edit.php";

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

    } else if ($_GET['pages'] == 'tipe_kamar') {
    	include "pages/tipe_kamar/tipe_kamar.php";
    } else if ($_GET['pages'] == 'tambah_tipe_kamar') {
    	include "pages/tipe_kamar/form_tambah.php";
    } else if ($_GET['pages'] == 'edit_tipe_kamar') {
    	include "pages/tipe_kamar/form_edit.php";
        
    } else if ($_GET['pages'] == 'kamar') {
        include "pages/kamar/kamar.php";
    } else if ($_GET['pages'] == 'tambah_kamar') {
        include "pages/kamar/form_tambah.php";
    } else if ($_GET['pages'] == 'edit_kamar') {
        include "pages/kamar/form_edit.php";
        
    }  else {
        include "pages/home/home.php";
    }

    include "template/footer.php";
}
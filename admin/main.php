<?php
include "../lib/config.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    include "index.php";
} else {
    include "template/header.php";
    include "template/sidebar.php";

    if (empty($_GET)) {
        include "pages/home/home.php";
    } else if ($_GET['pages'] == 'home') {
        include "pages/home/home.php";

    } else if ($_GET['pages'] == 'messages') {
    	include "pages/messages/messages.php";

    } else if ($_GET['pages'] == 'laporan_kamar') {
    	include "pages/guest/kamar.php";
    } else if ($_GET['pages'] == 'laporan_order') {
    	include "pages/guest/order.php";

    } else if ($_GET['pages'] == 'account') {
    	include "pages/account/account_page.php";
    } else if ($_GET['pages'] == 'detail_account') {
    	include "pages/account/detail.php";
    } else if ($_GET['pages'] == 'cetak') {
    	include "pages/account/index.php";
    } else if ($_GET['pages'] == 'account_custom') {
        include "pages/account/account_page_custom.php";

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
        
    } else if ($_GET['pages'] == 'check_in') {
        include "pages/check_in/daftar_kamar.php";
    } else if ($_GET['pages'] == 'form_booking') {
        include "pages/check_in/form_booking.php";
    } else if ($_GET['pages'] == 'form_checkin') {
        include "pages/check_in/form_checkin.php";

    } else if ($_GET['pages'] == 'booking') {
        include "pages/booking/booking.php";
    } else if ($_GET['pages'] == 'booking_detail') {
        include "pages/booking/booking_detail.php";

    } else if ($_GET['pages'] == 'test') {
        include "pages/booking/test.php";

    } else if ($_GET['pages'] == 'reservasi') {
        include "pages/reservasi/reservasi.php";        
    } else if ($_GET['pages'] == 'order_tamu') {
        include "pages/reservasi/shop.php";        
    } else if ($_GET['pages'] == 'tambah_order_tamu') {
        include "pages/reservasi/form_order_tamu.php";        
    } else if ($_GET['pages'] == 'check_out') {
        include "pages/reservasi/check_out.php";
        
    }  else {
        include "pages/home/home.php";
    }

    include "template/footer.php";
    
}
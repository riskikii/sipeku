<?php
if (isset($_GET['url'])){
    $url=$_GET['url'];

    switch($url){
        case 'penyewaan':
            include 'penyewaan.php';
        break;

        case 'faktur':
            include 'faktur.php';
        break;

        case 'lap_terperinci':
            include 'lap_rinci.php';
        break;

        case 'lap_peritem':
            include 'lap_peritem.php';
        break;

        case 'lap_keseluruhan':
            include 'lap_keseluruhan.php';
        break;
    }
}

?>
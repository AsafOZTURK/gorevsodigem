<?php
ob_start();
session_start();
include "baglanti.php";

$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
    'mail' => $_SESSION["kullanici_mail"]
));

$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);


$say = $kullanicisor->rowCount();  // giris yapmış kullanıcı var mı diye bakıyoruz yoksa giriş sayfasına yönlendir<
if ($say == 0) {
    Header("Location:index.php?durum=izinsiz");
    exit;
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link href="assets/css/all.css" rel="stylesheet">
    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-switch.css" rel="stylesheet">
    <link href="assets/css/bootstrap-multiselect.css" rel="stylesheet">
    <link href="assets/css/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/alertify.core.css">
    <link rel="stylesheet" href="assets/css/alertify.default.css" id="toggleCSS">
    <link rel="stylesheet" href="assets/css/fuelux.min.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <link rel="stylesheet" href="assets/css/datetime.css">
    <link rel="stylesheet" href="assets/css/bs3.css">
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/0bcd3cd97b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        html, body {
            font-size: 15px;
        }
    </style>
</head>

<body>
    <center><br>
        <table border=0 width=1200>
            <tr>
                <td>
                    <nav role="navigation" class="navbar navbar-default navbar-success">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="profil.php?kullanici_id=<?php echo $kullanicicek["kullanici_id"]; ?>" class="navbar-brand"><?php echo $kullanicicek["kullanici_ad"] . " " . $kullanicicek["kullanici_soyad"]; ?></a>
                            </div>
                            <div id="bs-example-navbar-collapse-3" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="anasayfa.php"> <i class="fa fa-bullhorn fa-3x"></i> Olaylar</a></li>
                                    <li><a href="tum-gorevler.php"> <i class="fa fa-th-list fa-3x"></i>Tüm Görevler</a></li>
                                    <li><a href="personel.php"><i class="fa fa-users fa-3x"></i>Personel</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="islem.php?cikis=ok"><i class="fa fa-arrow-circle-right fa-3x"></i> Çıkış</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
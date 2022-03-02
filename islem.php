<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

include "baglanti.php";


if (isset($_POST["yenikayit"])) {

    $kullanici_ad = htmlspecialchars($_POST['kullanici_ad']);
    $kullanici_soyad = htmlspecialchars($_POST['kullanici_soyad']);
    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    $kullanici_passwordone = $_POST['kullanici_passwordone'];
    $kullanici_passwordtwo = $_POST['kullanici_passwordtwo'];

    if ($kullanici_passwordone == $kullanici_passwordtwo) {

        $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
        $kullanicisor->execute(array(
            'mail' => $kullanici_mail
        ));

        $say = $kullanicisor->rowCount(); //aynı maille kayıtlı başka kullanıcı var mı ona bakıyoruz

        if ($say == 0) { // yoksa kayıt işlemine başlıyoruz

            $password = md5($kullanici_passwordone);

            $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET
                kullanici_ad=:kullanici_ad,
                kullanici_soyad=:kullanici_soyad,
                kullanici_mail=:kullanici_mail,
                kullanici_parola=:kullanici_parola
                ");

            $insert = $kullanicikaydet->execute(array(
                'kullanici_ad' => $kullanici_ad,
                'kullanici_soyad' => $kullanici_soyad,
                'kullanici_mail' => $kullanici_mail,
                'kullanici_parola' => $password
            ));

            if ($insert) {

                Header("Location:index.php?durum=kayitbasarili");
                exit;
            } else {

                Header("Location:kayitformu.php?durum=basarisiz");
                exit;
            }
        } else {

            Header("Location:kayitformu.php?durum=kayitlikullanici");
            exit;
        }
    } else {

        Header("Location:kayitformu.php?durum=farklisifre");
        exit;
    }
}


if (isset($_POST["kullanicigiris"])) {

    $kullanicimail = $_POST["kullanici_mail"];
    $kullaniciparola = ($_POST["kullanici_parola"]);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail AND kullanici_parola=:pass");

    $kullanicisor->execute(array(
        'mail' => $kullanicimail,
        'pass' => md5($kullaniciparola),
    ));

    $say = $kullanicisor->rowCount(); //mail ve şifrenin eşleştiği bir kullanıcı olup olmadığını sorguluyoruz varsa session atıyoruz

    if ($say == 1) {

        $_SESSION["kullanici_mail"] = $kullanicimail;
        Header("Location:olaylar.php?durum=girisbasarili");
        exit;
    } else {

        Header("Location:index.php?durum=girisbasarisiz");
        exit;
    }
}


if ($_GET["cikis"] == "ok") {

    session_destroy();
    Header("Location:index.php?durum=cikisbasarili");
}


if (isset($_POST["gorevolustur"])) {
    $gorev_veren = $_POST["gorev_veren"];
    $goren_gorevli = $_POST[""];

    $gorevkaydet = $db->prepare("INSERT INTO gorev SET
        gorev_detay=:detay,
        gorev_veren=:veren,
        gorev_gorevli=:gorevli,
        gorev_boyut=:boyut,
        gorev_gizlilik=:gizlilik        
    ");
    $insert = $gorevkaydet->execute(array(
        "detay" => $_POST["gorev_detay"],
        "veren" => $_POST["gorev_veren"],
        "gorevli" => $_POST["gorev_gorevli"],
        "boyut" => $_POST["gorev_boyut"],
        "gizlilik" => $_POST["gorev_gizlilik"]

    ));

    if ($insert) {

        Header("Location:olaylar.php?durum=goreveklendi");
        exit;
    } else {

        Header("Location:olaylar.php?durum=basarisiz");
        exit;
    }
}


if (isset($_POST["gorevnotekle"])) {
    $gorev_id = $_POST["gorev_id"];

    $gorevnotkaydet = $db->prepare("INSERT INTO gorevnotu SET
        gorevnotu_detay=:detay,
        gorevnotu_gorev=:gorev_id,
        gorevnotu_ekleyen=:ekleyen       
    ");
    $insert = $gorevnotkaydet->execute(array(
        "detay" => $_POST["gorevnotu_detay"],
        "gorev_id" => $gorev_id,
        "ekleyen" => $_POST["gorevnotu_ekleyen"]
    ));

    if ($insert) {
        Header("Location:gorev.php?gorev_id=$gorev_id&durum=gorevnoteklendi");
        exit;
    } else {
        Header("Location:gorev.php?gorev_id=$gorev_id&durum=noteklemebasarisiz");
        exit;
    }
}


if (isset($_POST["fikirekle"])) {

    $fikirkaydet = $db->prepare("INSERT INTO fikir SET
    fikir_baslik=:baslik,
    fikir_aciklama=:aciklama,
    fikir_ekleyen=:ekleyen,
    fikir_tur=:tur,
    fikir_rol=:rol    
    ");
    $insert = $fikirkaydet->execute(array(
        "baslik" => $_POST["fikir_baslik"],
        "aciklama" => $_POST["fikir_aciklama"],
        "ekleyen" => $_POST["fikir_ekleyen"],
        "tur" => $_POST["fikir_tur"],
        "rol" => $_POST["fikir_rol"]
    ));

    if ($insert) {
        Header("Location:fikir-havuzu.php?durum=fikireklendi");
        exit;

    } else {
        Header("Location:fikir-havuzu.php?durum=basarisiz");
        exit;

    }
}


if (isset($_POST["gunebasla"])) {
    $kullanici_id = $_POST["gunebaslabitir_kisi"];

    $gorevkaydet = $db->prepare("INSERT INTO gunebaslabitir SET
        gunebaslabitir_metin=:metin,
        gunebaslabitir_durum=:durum,
        gunebaslabitir_kisi=:kisi     
    ");
    $insert = $gorevkaydet->execute(array(
        "metin" => $_POST["gunebaslabitir_metin"],
        "kisi" => $kullanici_id,
        "durum" => 'basla'
    ));

    if ($insert) {

        Header("Location:olaylar.php?durum=gunebaslandi");
        exit;

    } else {

        Header("Location:profil.php?kullanici_id=$kullanici_id&durum=basarisiz");
        exit;
    }

}


if (isset($_POST["gunubitir"])) {
    $kullanici_id = $_POST["gunebaslabitir_kisi"];

    $gorevkaydet = $db->prepare("INSERT INTO gunebaslabitir SET
        gunebaslabitir_metin=:metin,
        gunebaslabitir_durum=:durum,
        gunebaslabitir_kisi=:kisi     
    ");
    $insert = $gorevkaydet->execute(array(
        "metin" => $_POST["gunebaslabitir_metin"],
        "kisi" => $kullanici_id,
        "durum" => 'bitir'
    ));

    if ($insert) {

        Header("Location:olaylar.php?durum=gunbitirildi");
        exit;

    } else {

        Header("Location:profil.php?kullanici_id=$kullanici_id&durum=basarisiz");
        exit;
    }

}


if (isset($_POST["manuelolaykaydet"])) {

    $gorevkaydet = $db->prepare("INSERT INTO olay SET
        olay_metin=:metin,
        olay_olusturan=:olusturan   
    ");
    $insert = $gorevkaydet->execute(array(
        "metin" => $_POST["olay_metin"],
        "olusturan" => $_POST["olay_olusturan"]
    ));

    if ($insert) {

        Header("Location:olaylar.php?durum=manuelolayeklendi");
        exit;

    } else {

        Header("Location:olaylar.php?durum=basarisiz");
        exit;
    }

}

if ($_GET["durumdegistir"] == 0) {
    $kullaniciid = $_GET["kullanici_id"];
    $gorevid = $_GET["gorevno"];

    $durumdegistir = $db -> prepare("UPDATE gorev 
    SET gorev_durum=:durum
    WHERE gorev_id= $gorevid
    ");

    $update = $durumdegistir ->execute(array(
        "durum" => 0
    ));

    if ($update) {

        Header("Location:profil.php?kullanici_id=$kullaniciid&durum=basarili");
        exit;

    } else {

        Header("Location:profil.php?kullanici_id=$kullaniciid&durum=basarisiz");
        exit;
    }
}


if ($_GET["durumdegistir"] == 1) {
    $kullaniciid = $_GET["kullanici_id"];
    $gorevid = $_GET["gorevno"];

    $durumdegistir = $db -> prepare("UPDATE gorev 
    SET gorev_durum=:durum
    WHERE gorev_id = $gorevid
    ");

    $update = $durumdegistir ->execute(array(
        "durum" => 1
    ));

    if ($update) {

        Header("Location:profil.php?kullanici_id=$kullaniciid&durum=basarili");
        exit;

    } else {

        Header("Location:profil.php?kullanici_id=$kullaniciid&durum=basarisiz");
        exit;
    }
}


if ($_GET["durumdegistir"] == 2) {
    $kullaniciid = $_GET["kullanici_id"];
    $gorevid = $_GET["gorevno"];

    $durumdegistir = $db -> prepare("UPDATE gorev 
    SET gorev_durum=:durum
    WHERE gorev_id=$gorevid
    ");

    $update = $durumdegistir ->execute(array(
        "durum" => 2,
    ));

    if ($update) {

        Header("Location:profil.php?kullanici_id=$kullaniciid&durum=basarili");
        exit;

    } else {

        Header("Location:profil.php?kullanici_id=$kullaniciid&durum=basarisiz");
        exit;
    }
}
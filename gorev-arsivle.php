<?php
include "baglanti.php";
date_default_timezone_set('Europe/Istanbul');

$gorevsor = $db->prepare("SELECT * FROM gorev WHERE gorev_arsiv=:arsiv");
$gorevsor->execute(array( 
    "arsiv" => 0
)); 

$simdi = time(); //şimdiki zamanı alıyoruz

while ($gorevcek = $gorevsor->fetch(PDO::FETCH_ASSOC)) {
    $tarih = strtotime($gorevcek["gorev_tarih"]);  //görevin oluşturulma zamanını alıyoruz
    $fark = ($simdi - $tarih); 

    $gun = ($fark / 86400);  //tariler arası saniye farkını güne çevirmek içini 1 güne bölüyoruz

    if ($gun >= 15) { //eğer 15 günü geçmişse

        $gorev_id = $gorevcek["gorev_id"];

        $durumdegistir = $db -> prepare("UPDATE gorev 
            SET gorev_arsiv=:arsiv
            WHERE gorev_id= $gorev_id
        ");

        $update = $durumdegistir ->execute(array(
            "arsiv" => 1 //gorev arsin sutünunu 0'dan beri çeviriyoruz ve görevlerimizin yazdırıldığı sayfalarda geçersiz hala getiriyoruz
        ));
    }
}

?>
<?php 
include "header.php";

$gorevsor = $db->prepare("SELECT * 
    FROM gorev 
    INNER JOIN kullanici
    ON gorev.gorev_veren=kullanici_id
    WHERE gorev_arsiv=:arsiv
    ");

$gorevsor->execute(array( // 15 günü geçen görevler arşivlenmiş oluyor ve burayda göstermiyoruz
    "arsiv" => 0
)); 

/* -----------------ARŞİVLENEN GÖREVLERİ SAYMA---------------*/
$arsivsay = $db -> prepare("SELECT 
    COUNT(gorev_arsiv) AS 'arsivlenen'
    FROM gorev
    WHERE gorev_arsiv=:arsiv
");

$arsivsay -> execute(array(
    "arsiv" => 1
));

$arsiv = $arsivsay->fetch(PDO::FETCH_ASSOC);
$sayi = $arsiv["arsivlenen"];
/* -----------------------------------------------------------*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tüm Görevler &nbsp;&nbsp;<small>(Tamamlanıp arşivlenmiş <b><?php echo $sayi; ?> görev</b>)</small></h4>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width='180'>Oluşturulma Bilgileri</th>
                    <th width='180'>Görevli</th>
                    <th>Görev</th>
                    <th width='130'>Durumu</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($gorevcek = $gorevsor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><a href='profil.php?kullanici_id=<?php echo $gorevcek["kullanici_id"];?>'><?php echo $gorevcek["kullanici_ad"] . " " . $gorevcek["kullanici_soyad"];?></a><br /><small>
                            <?php 
                            $value = $gorevcek["gorev_tarih"];
                            $v_year= substr($value,0,4);
                            $v_month= substr($value,5,2);
                            $v_day= substr($value,8,2);
                            $v_hours = substr($value,11,2);
                            $v_minute= substr($value,14,2);
                            $value=$v_day.".".$v_month.".".$v_year. " (" . $v_hours . ":" . $v_minute . ")";
                            echo $value;
                            ?>

                            <br>25.02.2022 (17:00)</small><br /></td> <!-- Buraya sonraki cumanın tarihi gelecek ama nasıl yapacağımı bilmiyorum daha-->
                        <td>
                            <?php 
                            $gorevlisor = $db->prepare("SELECT * 
                            FROM gorev 
                            INNER JOIN kullanici
                            ON gorev.gorev_gorevli=kullanici.kullanici_id
                            WHERE gorev_id=:id
                            ");
                            $gorevlisor->execute(array(
                                "id" => $gorevcek["gorev_id"]
                            ));
                            $gorevlicek = $gorevlisor->fetch(PDO::FETCH_ASSOC);  
                            ?>

                            <a href='profil.php?kullanici_id=<?php echo $gorevlicek["kullanici_id"];?>'><?php echo $gorevlicek["kullanici_ad"] . " " . $gorevlicek["kullanici_soyad"]; ?></a>
                        </td>
                        <td><a href="gorev.php?gorev_id=<?php echo $gorevcek["gorev_id"]; ?>"><?php echo $gorevcek["gorev_detay"];?> </a><br>
                        <?php 
                        switch ($gorevcek['gorev_boyut']) {
                            case '5': ?>
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;<?php
                                break;
                            case '4': ?>
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;<?php
                                break;
                            case '3': ?>
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;<?php
                                break;
                            case '2': ?>
                                <img src='gorseller/yildiz.png'>&nbsp;
                                <img src='gorseller/yildiz.png'>&nbsp;<?php
                                break;
                            case '1': ?>
                                <img src='gorseller/yildiz.png'>&nbsp;<?php
                                break;
                        } ?>     
                        </td>
                        <td>
                        <?php 
                        switch ($gorevcek['gorev_durum']) {
                            case '0': ?>
                               <font color='#d44344'><b><i class="fa fa-exclamation-circle"></i> Başlanmadı</b></font><?php
                                break;
                            case '1': ?>
                                <font color='#f9a546'><b><i class="fa fa-play"></i> Başlandı</b></font><?php
                                break;
                            case '2': ?>
                               <font color='#0fb493'><b><i class="fa fa-check"></i> Tamamlandı</b></font><?php
                                break;
                        } ?>    
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</td>
</tr>
</table>
</center>
<?php include "footer.php"; ?>
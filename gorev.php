<?php
include "header.php";

$gorevdetaysor = $db->prepare("SELECT * 
FROM gorev
INNER JOIN kullanici
ON kullanici.kullanici_id=gorev.gorev_veren
WHERE gorev_id=:id
");
$gorevdetaysor->execute(array(
    'id' => $_GET["gorev_id"]
));
$gorevdetaycek = $gorevdetaysor->fetch(PDO::FETCH_ASSOC);

//tek sorguda hem görev vereni hem görevliyi çekemediğim için iki sorgu yaptım
$gsor = $db->prepare("SELECT * 
FROM gorev
INNER JOIN kullanici
ON kullanici.kullanici_id=gorev.gorev_gorevli
WHERE gorev_id=:id
");
$gsor->execute(array(
    'id' => $_GET["gorev_id"]
));
$gcek = $gsor->fetch(PDO::FETCH_ASSOC);
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h4>
            Görev Detayı
        </h4>
    </div>
    <div class="panel-body">

        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Görevli</div>
                <div class='panel-body' style='height: 50px;'>
                    <?php echo $gcek["kullanici_ad"] . " " . $gcek["kullanici_soyad"]; ?>
                </div>
            </div>
        </div>
        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Oluşturan</div>
                <div class='panel-body' style='height: 50px;'>
                    <?php echo $gorevdetaycek["kullanici_ad"] . " " . $gorevdetaycek["kullanici_soyad"]; ?>
                </div>
            </div>
        </div>
        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Oluşturulma Tarihi</div>
                <div class='panel-body' style='height: 50px;'>
                    <?php echo $gorevdetaycek["gorev_tarih"]; ?>
                </div>
            </div>
        </div>
        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Beklenen Tamamlanma Tarihi</div>
                <div class='panel-body' style='height: 50px;'>
                    18.02.2022 (17:00)
                </div>
            </div>
        </div>
        <div class='col-lg-6'>
            <div class='panel panel-default'>
                <div class='panel-heading'>İş Hacmi</div>
                <div class='panel-body'>
                    <?php
                    switch ($gorevdetaycek['gorev_boyut']) {
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
                </div>
            </div>
        </div>
        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Gizlilik Durumu</div>
                <div class='panel-body'>
                    <?php
                    if ($gorevdetaycek["gorev_gizlilik"] == "1") { ?>

                        <font color='#0fb493'>Açık</font>

                    <?php } else if ($gorevdetaycek["gorev_gizlilik"] == "2") { ?>

                        <font color='red'>Gizli</font>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Görevin Durumu</div>
                <div class='panel-body'>
                    <?php
                    if ($gorevdetaycek["gorev_durum"] == "0") { ?>

                        <font color='#d44344'><b><i class="fa fa-exclamation-circle"></i> Başlanmadı</b></font>


                    <?php } else if ($gorevdetaycek["gorev_durum"] == "1") { ?>

                        <font color='#f9a546'><b><i class="fa fa-play"></i> Başlandı</b></font>


                    <?php } else if ($gorevdetaycek["gorev_durum"] == "2") { ?>

                        <font color='#0fb493'><b><i class="fa fa-check"></i> Tamamlandı</b></font>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Görev</div>
                <div class='panel-body'>
                    <?php echo $gorevdetaycek["gorev_detay"]; ?>
                </div>
            </div>
        </div>
        <div class='col-lg-12' align='right'> </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            Görev Notları
        </h4>
    </div>
    <div class="panel-body">
        <div class='content'>
            <form role='form' class='form-horizontal' action='islem.php' method='post'>

                <div class='form-group'>
                    <div class='col-sm-10'>
                        <div class='input-group' data-validate='length' data-length='5'> <input type='text' maxlength='300' class='form-control' name='gorevnotu_detay' id='validate-length' placeholder='Göreve iliştireceğiniz notu yazınız.' required>
                            <span class='input-group-addon danger'><span class='fa fa-times'></span></span>
                        </div>
                    </div>
                    <div class='col-sm-2'>
                        <input type='hidden' name='gorev_id' value='<?php echo $gorevdetaycek["gorev_id"]; ?>'>
                        <input type="hidden" name="gorevnotu_ekleyen" value="<?php echo $kullanicicek["kullanici_id"]; ?>">
                        <button class="btn btn-lg btn-info" name="gorevnotekle" type="submit" style="width:150;"><i class='fa fa-pencil'></i> Not Ekle</button>
                    </div>
                </div>
            </form>
        </div>
        <div class='panel panel-default'>
            <?php
            $gorevnotusor = $db->prepare("SELECT * 
            FROM gorevnotu
            INNER JOIN kullanici
            ON kullanici.kullanici_id=gorevnotu.gorevnotu_ekleyen
            WHERE gorevnotu_gorev=:id
            ");
            $gorevnotusor->execute(array(
                'id' => $_GET["gorev_id"]
            ));
            $say = $gorevnotusor->rowCount();

            if ($say == 0) { ?>

                <div class='panel-body'><small><i>Göreve henüz not eklenmemiş.</i></small></div>

                <?php } else {

                while ($gorevnotucek = $gorevnotusor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class='panel-body'>
                        <div class="alert alert-dismissable alert-bg-white alert-warning">
                            <div class="icon"></div>
                            <small><b><?php echo $gorevnotucek["kullanici_ad"] . " " . $gorevnotucek["kullanici_soyad"]; ?></b></small><br>
                            <?php echo $gorevnotucek["gorevnotu_detay"]; ?>
                        </div>                          
                    </div>
                <?php }
            } ?>

        </div>
    </div>
</div>
</td>
</tr>
</table>
</center>
<?php include "footer.php"; ?>
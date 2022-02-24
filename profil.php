<?php
include "header.php";

$pkullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
$pkullanicisor->execute(array(
    'id' => $_GET["kullanici_id"]
));

$pkullanicicek = $pkullanicisor->fetch(PDO::FETCH_ASSOC);

?>


<div class="flat-form">
    <div class="header">
        <h3><?php echo $pkullanicicek["kullanici_ad"] . " " . $pkullanicicek["kullanici_soyad"]; ?></h3>
    </div>
    <div class="content">
        <form role="form" class="form-horizontal" action="islem.php" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group" data-validate="length" data-length="5">
                        <input type="text" maxlength='300' class="form-control" name="gorev_detay" id="validate-length" placeholder="<?php echo $pkullanicicek["kullanici_ad"] . " " . $pkullanicicek["kullanici_soyad"]; ?> için oluşturacağınız görevi kısaca yazınız." required>
                        <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-1 control-label" for="select1" style="padding-top:18;" style='width:100%;'>İş Hacmi:</label>
                <div class="col-lg-2" style="padding-top:10;">
                    <select id="select1" class="form-control" name='gorev_boyut'>
                        <option value='1'>Çok Küçük</option>
                        <option value='2' selected>Küçük</option>
                        <option value='3'>Orta</option>
                        <option value='4'>Büyük</option>
                        <option value='5'>Çok Büyük</option>
                    </select>
                </div>
                <label class="col-sm-2 control-label" for="select2" style="padding-top:18;">Tamamlanma:</label>
                <div class="col-sm-2" style="padding-top:10;" style='width:100%;'>
                    <select id="select2" class="form-control" name='tamamlanma'>
                        <option value='1' selected>Cuma Günü</option>
                        <option value='2'>Sonraki Cuma Günü</option>
                    </select>
                </div>
                <label class="col-sm-1 control-label" for="select3" style="padding-top:18;">Gizlilik:</label>
                <div class="col-sm-2" style="padding-top:10;" style='width:100%;'>
                    <select id="select3" class="form-control" name='gorev_gizlilik'>
                        <option value='1' selected>Açık</option>
                        <option value='2'>Gizli</option>
                    </select>
                </div>

                <input type='hidden' name='gorev_gorevli' value='<?php echo $_GET["kullanici_id"]; ?>'>
                <input type='hidden' name='gorev_veren' value='<?php echo $kullanicicek["kullanici_id"]; ?>'>
                <div class="col-sm-2" align='right' style="padding-top:10;"><button class="btn btn-warning" name="gorevolustur" type="submit" style='width:100%;'><i class="fa fa-plus"></i> Görev Oluştur</button>
                </div>
            </div>
        </form>
    </div>
    <?php //sayfadaki kullanıcı bizsek güne başla menüsünü göstermek için
    if ($_GET["kullanici_id"] == $kullanicicek["kullanici_id"]) { ?>
        <div class='content'>
            <form role='form' class='form-horizontal' action='islem.php' method='post'>
                <div class='form-group'>
                    <div class='col-sm-10'>
                        <div class='input-group' data-validate='length' data-length='5'> <input type='text' maxlength='300' class='form-control' name='gunebaslabitirmetni' id='validate-length' placeholder='Bugün yapacağınız çalışmaları kısaca yazınız.' required>
                            <span class='input-group-addon danger'><span class='fa fa-times'></span></span>
                        </div>
                    </div>
                    <div class='col-sm-2'>
                        <button class='btn btn-success' type='submit' name="gunebasla" style='width:100%;'><i class='fa fa-sun-o'></i> Güne Başla</button>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>

</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <blockquote class='pull-right'>
                <p>Dünyayı değiştirebilen insanlar buna inanacak kadar deli olanlardır.</p><small>Jobs</small>
            </blockquote><br><br><b>Görevleri</b>
        </h4>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width='220'>Oluşturulma Bilgileri</th>
                    <th>Görev</th>
                    <th width='180'>Görevin Durumu</th>
                    <th width='200'></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gorevsor = $db->prepare("SELECT * 
                FROM gorev 
                INNER JOIN kullanici
                ON gorev.gorev_veren=kullanici.kullanici_id
                WHERE gorev_gorevli=:id
                ");

                $gorevsor->execute(array(
                    'id' => $_GET["kullanici_id"]
                ));

                while ($gorevcek = $gorevsor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $gorevcek["kullanici_ad"] . " " . $gorevcek["kullanici_soyad"]; ?><br><?php echo $gorevcek["gorev_tarih"]; ?><br>15.10.2021 (17:00)</td>
                        <td><strong>
                            <?php 
                            if ($gorevcek["gorev_gizlilik"] == 2) {?>

                                <font color="#d44344">Gizli görev.</font>

                            <?php } else if ($gorevcek["gorev_gizlilik"] == 1) { 

                                echo $gorevcek["gorev_detay"]; 

                            }
                            ?>
                            <br><a href='gorev.php?gorev_id=<?php echo $gorevcek["gorev_id"];?>'><button class='btn btn-xs btn-info' type='button'>Detay</button></a>
                            </strong><br>
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
                        <td align='right'> </td>
                    </tr>

                <?php } ?>
                <tr>
                    <td colspan=5>
                        <center><small>Tamamlanmasnın ardından 15 gün geçen görevler arşivlenir. <?php echo $pkullanicicek["kullanici_ad"] . " " . $pkullanicicek["kullanici_soyad"]; ?> tarafından tamamlanıp arşivlenmiş <b>0 görev</b> var.</small></center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class='panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Güne Başlama ve Günü Bitirme Kayıtları</h3>
    </div>
    <div class='panel-body'>
        <!-- <div class='alert alert-dismissable alert-bg-white alert-info'>
            <div class='icon'><i class='fa fa-moon-o'></i></div> İdari işler.. <strong>26.04.2021 (18:14)</strong>
        </div>
        <div class='alert alert-dismissable alert-bg-white alert-success'>
            <div class='icon'><i class='fa fa-sun-o'></i></div> İdari işler.. <strong>26.04.2021 (09:31)</strong>
        </div> -->

    </div>
</div>

<div class='panel panel-info'>
    <div class='panel-heading'>
        <h3 class='panel-title'>Arma Puanları</h3>
    </div>
    <div class='panel-body'>
        <div class="col-lg-2">
            <center><img src='gorseller/saat.png'><br><b>Mesai Disiplini</b><br>
                <font color='#0fb493'><big><b>0 Puan</b></big></font></small>
        </div>
        <div class="col-lg-2">
            <center><img src='gorseller/tik.png'><br><b>Görev Bilinci</b><br>
                <font color='#0fb493'><big><b>0 Puan</b></big></font></small>
        </div>
        </center>
    </div>
</div>

</td>
</tr>
</table>
</center>
<?php include "footer.php"; ?>
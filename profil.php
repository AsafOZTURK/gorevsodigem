<?php 
include "header.php"; 

$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
$kullanicisor->execute(array(
    'id' => $_GET["kullanici_id"]
));

$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

?>


<div class="flat-form">
    <div class="header">
        <h3><?php echo $kullanicicek["kullanici_ad"] . " " . $kullanicicek["kullanici_soyad"]; ?></h3>
    </div>
    <div class="content">
        <form role="form" class="form-horizontal" action="islem.php" method="post">
            <input type='hidden' name='gorev_gorevli' value='<?php echo $_GET["kullanici_id"]; ?>'>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group" data-validate="length" data-length="5">
                        <input type="text" maxlength='300' class="form-control" name="gorev_detay" id="validate-length" placeholder="<?php echo $kullanicicek["kullanici_ad"] . " " . $kullanicicek["kullanici_soyad"]; ?> için oluşturacağınız görevi kısaca yazınız." required>
                        <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                    </div>
                </div>
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
                    <select id="select3" class="form-control" name='gorev_gizlili'>
                        <option value='1' selected>Açık</option>
                        <option value='2'>Gizli</option>
                    </select>
                </div>
                <div class="col-sm-2" align='right' style="padding-top:10;"><button class="btn btn-warning" name="gorevolustur" type="submit" style='width:100%;'><i class="fa fa-plus"></i> Görev Oluştur</button>
                </div>

            </div>
        </form>
    </div>
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
                <tr>
                    <td>İrem Ebru Yıldırım Şen<br>01.10.2021 (10:25)<br>15.10.2021 (17:00)</td>
                    <td>Kitabın editör yazısının yazılması <br><a href='anasayfa.php?sayfaturu=7&gorevnum=7177'><button class='btn btn-xs btn-info' type='button'>Detay</button></a><br><img src='/gorseller/yildiz.png'>&nbsp;<img src='/gorseller/yildiz.png'>&nbsp;<img src='/gorseller/yildiz.png'>&nbsp;<img src='/gorseller/yildiz.png'>&nbsp;</td>
                    <td>
                        <font color='#d44344'><b><i class="fa fa-exclamation-circle"></i> Başlanmadı</b></font>
                    </td>
                    <td align='right'> </td>
                </tr>
                <tr>
                    <td colspan=5>
                        <center><small>Tamamlanmasnın ardından 15 gün geçen görevler arşivlenir. <?php echo $kullanicicek["kullanici_ad"] . " " . $kullanicicek["kullanici_soyad"]; ?> tarafından tamamlanıp arşivlenmiş <b>51 görev</b> var.</small></center>
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
        <div class='alert alert-dismissable alert-bg-white alert-info'>
            <div class='icon'><i class='fa fa-moon-o'></i></div> İdari işler.. <strong>26.04.2021 (18:14)</strong>
        </div>
        <div class='alert alert-dismissable alert-bg-white alert-success'>
            <div class='icon'><i class='fa fa-sun-o'></i></div> İdariişler.. <strong>26.04.2021 (09:31)</strong>
        </div>

    </div>
</div>

</td>
</tr>
</table>
</center>
<?php include "footer.php"; ?>
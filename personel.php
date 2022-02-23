<?php include "header.php"; ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>SODİGEM PERSONELİ</h4>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width='200'>İsim</th>
                    <th>Durum</th>
                    <th width='120'>Komut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kullanicisor = $db->prepare("SELECT * FROM kullanici");
                $kullanicisor->execute();

                while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>

                    <tr>
                        <td><?php echo $kullanicicek["kullanici_ad"]. " " . $kullanicicek["kullanici_soyad"];?></td>
                        <td></td>
                        <td><a href='profil.php?kullanici_id=<?php echo $kullanicicek["kullanici_id"];?>'><button type="button" class="btn btn-info" style="width:100%;"><i class="fa fa-user"></i> Profil</button></td>
                    </tr>

                <?php } ?>

                <!-- <tr> ÖRNEK OLARAK DURSUN SONRA BAKICAM
                    <td>Tuğçe Keleş</td>
                    <td>
                        <font color='#2E86C1'><i class='fa fa-moon-o'></i> Günü bitirdi: "Yeni içerik hazırlandı"<br>
                            <font color='#f9a546'><b><i class="fa fa-play"></i> Yeni broşür serisi hazırlama içerik desteği</b></font></br><br>
                            <font color='#f9a546'><b><i class="fa fa-play"></i> Broşür içerik ekleme kontrolü</b></font></br><br>
                            <font color='#f9a546'><b><i class="fa fa-play"></i> Paylaşım kontrolü</b></font></br>
                    </td>
                    <td><a href='anasayfa.php?prnum=54&sayfaturu=6'><button type="button" class="btn btn-info" style="width:100%;"><i class="fa fa-user"></i> Profil</button></td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

</center>
<?php include "footer.php"; ?>
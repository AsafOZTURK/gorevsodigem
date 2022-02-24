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
                        <td>
                            <?php
                            $gorevsor = $db->prepare("SELECT * FROM gorev WHERE gorev_gorevli=:id AND gorev_durum=:durum");
                            $gorevsor->execute(array(
                                'id' => $kullanicicek['kullanici_id'],
                                'durum' => 1 //sadece başlandı olan görevleri listelemek için
                            ));
                            
                            while ($gorevcek = $gorevsor->fetch(PDO::FETCH_ASSOC)) {?>

                                <font color='#f9a546'><b><i class="fa fa-play"></i> <?php echo $gorevcek["gorev_detay"]; ?></b></font></br>
                                <!-- <font color='#2E86C1'><i class='fa fa-moon-o'></i> Günü bitirdi: "Yeni içerik hazırlandı"<br> -->

                            <?php } ?>

                        </td>
                        <td><a href='profil.php?kullanici_id=<?php echo $kullanicicek["kullanici_id"];?>'><button type="button" class="btn btn-info" style="width:100%;"><i class="fa fa-user"></i> Profil</button></td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

</center>
<?php include "footer.php"; ?>
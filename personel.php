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

                            $gunebaslabitirsor = $db -> prepare("SELECT * 
                            FROM gunebaslabitir
                            WHERE gunebaslabitir_kisi=:id
                            ORDER BY gunebaslabitir_zaman DESC
                            LIMIT 1
                            ");
                            $gunebaslabitirsor -> execute(array(
                                "id" => $kullanicicek["kullanici_id"]
                            ));
                            $gunebaslabitircek = $gunebaslabitirsor->fetch(PDO::FETCH_ASSOC);
                            

                            if ($gunebaslabitircek["gunebaslabitir_durum"] == "basla") { ?>

                                <font color='green'><i class='fa fa-sun-o'></i> Güne başladı: "<?php echo $gunebaslabitircek["gunebaslabitir_metin"]; ?>"<br>

                            <?php } else if ($gunebaslabitircek["gunebaslabitir_durum"] == "bitir") {?>

                                <font color='#2E86C1'><i class='fa fa-moon-o'></i> Günü bitirdi: "<?php echo $gunebaslabitircek["gunebaslabitir_metin"]; ?>"<br>

                            <?php } 

                            while ($gorevcek = $gorevsor->fetch(PDO::FETCH_ASSOC)) {?>

                                <font color='#f9a546'><b><i class="fa fa-play"></i> <?php echo $gorevcek["gorev_detay"]; ?></b></font></br>

                            <?php } 
                            ?>

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
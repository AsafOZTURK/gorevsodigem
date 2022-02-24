<?php 
include "header.php"; 
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tüm Görevler &nbsp;&nbsp;<small>(Tamamlanıp arşivlenmiş <b>0 görev</b>)</small></h4>
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
                $gorevsor = $db->prepare("SELECT * 
                FROM gorev 
                INNER JOIN kullanici
                ON gorev.gorev_veren=kullanici_id
                ");
                $gorevsor->execute();

                while ($gorevcek = $gorevsor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><a href='profil.php?kullanici_id=<?php echo $gorevcek["kullanici_id"];?>'><?php echo $gorevcek["kullanici_ad"] . " " . $gorevcek["kullanici_soyad"];?></a><br /><small><?php echo $gorevcek["gorev_tarih"];?><br>25.02.2022 (17:00)</small><br /></td>
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
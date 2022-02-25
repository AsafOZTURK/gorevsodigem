<?php include "header.php"; ?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h4>
            Yeni Fikir
        </h4>
    </div>
    <div class="panel-body">
        <div class="content">
            <form role="form" class="form-horizontal" action="islem.php" method="post">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group" data-validate="length" data-length="5">
                            <input type="text" maxlength='120' class="form-control" name="fikir_baslik" id="validate-length" placeholder="Fikriniz için bir başlık yazınız..." required>
                            <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="padding-top:10;">
                        <div class="input-group" data-validate="length" data-length="5">
                            <textarea required placeholder="Fikrinizi açıklayınız..." name="fikir_aciklama" maxlength='2000' id="validate-length" rows="2" class="form-control" style="margin: 0px 20.1562px 0px 0px; width: 100%; height: 140px;"></textarea>
                            <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3" align='right' style="padding-top:10;" required>
                        <select id="select1" class="form-control" name='fikir_tur'>
                            <option value='1' selected>SODİGEM Web</option>
                            <option value='2'>Animasyon/Video</option>
                            <option value='3'>Bildiri</option>
                            <option value='4'>Makale</option>
                            <option value='5'>Kitap</option>
                            <option value='6'>TÜBİTAK Projesi</option>
                            <option value='7'>SODİGEM'in İşletimi</option>
                            <option value='8'>SODİGEM Etkinliği</option>
                            <option value='10'>Diğer</option>
                        </select>
                    </div>
                    <div class="col-sm-7" align='right' style="padding-top:10;">
                        <select id="select1" class="form-control" name='fikir_rol'>
                            <option value='1'>Uygulanma sürecinde herhangi bir görev almak istemem.</option>
                            <option value='2' selected>Gerekirse uygulanma sürecinde görev alabilirim.</option>
                            <option value='3'>Uygulanma sürecinde görev almak isterim ancak sürecin liderliğini üstlenmek istemem.</option>
                            <option value='4'>Uygulanma sürecinde görev almak isterim. Gerekirse liderliğini de üstlenebilirim.</option>
                            <option value='5'>Uygulanma sürecinde görev almak ve sürece liderlik etmek isterim.</option>
                        </select>
                    </div>
                    <input type="hidden" name="fikir_ekleyen" value="<?php echo $kullanicicek["kullanici_id"]; ?>">
                    <div class="col-sm-2" align='right' style="padding-top:10;">
                        <button class="btn btn-info" name="fikirekle" type="submit" style='width:100%;'><i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp;Fikir Ekle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

$fikirsor = $db->prepare("SELECT * 
    FROM fikir
    INNER JOIN kullanici
    ON kullanici.kullanici_id=fikir.fikir_ekleyen
    ORDER BY fikir_tarih DESC   
    ");

$fikirsor->execute();

while ($fikircek = $fikirsor->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <table border=0>
                <tr>
                    <td width=900>
                        <h4><?php echo $fikircek["fikir_baslik"];?></h4>
                    </td>

                    <?php 
                    switch ($fikircek["fikir_tur"]) {
                        case '1': ?>
                            <td width=260 align=right> SODİGEM Web</td><?php
                            break;
                        case '2': ?>
                            <td width=260 align=right> Animasyon/Video</td><?php
                            break;
                        case '3': ?>
                            <td width=260 align=right> Bildiri</td><?php
                            break;
                        case '4': ?>
                            <td width=260 align=right> Makale</td><?php
                            break;
                        case '5': ?>
                            <td width=260 align=right> Kitap</td><?php
                            break;
                        case '6': ?>
                            <td width=260 align=right> TÜBİTAK Projesi</td><?php
                            break;
                        case '7': ?>
                            <td width=260 align=right> SODİGEM'in İşletimi</td><?php
                            break;
                        case '8': ?>
                            <td width=260 align=right> SODİGEM Etkinliği</td><?php
                            break;
                        case '10' ?>
                            <td width=260 align=right> Diğer</td><?php
                            break;
                    }
                    ?>    

                </tr>
            </table>
        </div>
        <div class='panel-body'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>Açıklama</div>
                    <div class='panel-body'>

                        <?php echo $fikircek["fikir_aciklama"];?> 
                    
                        - <small><i><?php echo $fikircek["fikir_tarih"]; ?></i></small>
                    </div>
                </div>
            </div>
            <div class='col-lg-3'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>Oluşturan</div>
                    <div class='panel-body' style='height: 50px;'>
                        <?php echo $fikircek["kullanici_ad"] . " " . $fikircek["kullanici_soyad"];?>
                    </div>
                </div>
            </div>
            <div class='col-lg-9'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>Görev Talebi</div>
                    <div class='panel-body' style='height: 50px;'>

                    <?php 
                    switch ($fikircek["fikir_rol"]) {
                        case '1': ?>
                            Uygulanma sürecinde herhangi bir görev almak istemem.<?php
                            break;
                        case '2': ?>
                            Gerekirse uygulanma sürecinde görev alabilirim.<?php
                            break;
                        case '3': ?>
                            Uygulanma sürecinde görev almak isterim ancak sürecin liderliğini üstlenmek istemem.<?php
                            break;
                        case '4': ?>
                            Uygulanma sürecinde görev almak isterim. Gerekirse liderliğini de üstlenebilirim.<?php
                            break;
                        case '5': ?>
                            Uygulanma sürecinde görev almak ve sürece liderlik etmek isterim.<?php
                            break;
                       
                    }
                    ?>   
                            
                    </div>
                </div>
            </div>
            <div class='col-lg-12' align='right'></div>
        </div>
    </div>
<?php }
?>

</td>
</tr>
</table>
</center>


<?php include "footer.php"; ?>
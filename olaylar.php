<?php
include "header.php";

$gunebaslabitirsor = $db->prepare("SELECT * 
FROM gunebaslabitir
INNER JOIN kullanici
ON kullanici.kullanici_id=gunebaslabitir.gunebaslabitir_kisi
ORDER BY gunebaslabitir_zaman DESC      
");
$gunebaslabitirsor->execute();


$manuelolaysor = $db->prepare("SELECT * FROM olay ORDER BY olay_zaman DESC");
$manuelolaysor->execute();



?>
<div class='content'>
    <form role='form' class='form-horizontal' action='islem.php' method='post'>
        <div class='form-group'>
            <div class='col-sm-10'>
                <div class="input-group" data-validate="length" data-length="5">
                    <input type="hidden" name="olay_olusturan" value="<?php echo $kullanicicek["kullanici_id"]; ?>">
                    <input type="text" maxlength='300' class="form-control" name="olay_metin" id="validate-length" placeholder="Eklemek istediğiniz olayı kısaca yazınız." required>
                    <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                </div>
            </div>
            <div class='col-sm-2'>
                <button class='btn btn-warning' type='submit' name="manuelolaykaydet" style='width:100%;'><i class='fa fa-bullhorn'></i> Manuel Olay Ekle</button>
            </div>
        </div>
    </form>
</div>

<?php
while ($manuelolaycek = $manuelolaysor->fetch(PDO::FETCH_ASSOC)) {?>
    <div class='alert alert-dismissable alert-bg-white alert-warning'> <div class='icon'><i class='fa fa-flag'></i> </div><b>İrem Ebru Yıldırım Şen</b>, Gökhan Cansız için sonraki Cuma günü tamamlanmak üzere büyük bir görev oluşturdu.<br><i>"Dijital Güvenlik kitabının video filminin yapılması "</i> - <small>17.02.2022 (12:21)</small></div>
<?php }

while ($gunebaslabitircek = $gunebaslabitirsor->fetch(PDO::FETCH_ASSOC)) {
    if ($gunebaslabitircek["gunebaslabitir_durum"] == "basla") { ?>

        <div class='alert alert-dismissable alert-success'> <i class='fa fa-sun-o'></i><b> <?php echo $gunebaslabitircek["kullanici_ad"] . " " . $gunebaslabitircek["kullanici_soyad"]; ?></b>, güne başladı.<i><small>&nbsp;&nbsp;&nbsp;"<?php echo $gunebaslabitircek["gunebaslabitir_metin"]; ?>"</small></i> - <small>(<?php echo $gunebaslabitircek["gunebaslabitir_zaman"]; ?>)</small></div>

    <?php } else if ($gunebaslabitircek["gunebaslabitir_durum"] == "bitir") { ?>

        <div class='alert alert-dismissable alert-info'> <i class='fa fa-moon-o'></i> <b><?php echo $gunebaslabitircek["kullanici_ad"] . " " . $gunebaslabitircek["kullanici_soyad"]; ?></b>, günü bitirdi.<i><small>&nbsp;&nbsp;&nbsp;"<?php echo $gunebaslabitircek["gunebaslabitir_metin"]; ?>"</small></i> - <small>(<?php echo $gunebaslabitircek["gunebaslabitir_zaman"]; ?>)</small></div>

<?php }
}
?>

</td>
</tr>
</table>
</center>
<?php include "footer.php"; ?>
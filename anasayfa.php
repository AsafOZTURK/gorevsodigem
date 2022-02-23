<?php include "header.php"; ?>
<div class='content'>
    <form role='form' class='form-horizontal' action='manuelolayekle.php' method='post'>
        <div class='form-group'>
            <div class='col-sm-10'>
                <div class="input-group" data-validate="length" data-length="5">
                    <input type="text" maxlength='300' class="form-control" name="olaymetni" id="validate-length" placeholder="Eklemek istediğiniz olayı kısaca yazınız." required>
                    <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                </div>
            </div>
            <div class='col-sm-2'>
                <button class='btn btn-warning' type='submit' style='width:100%;'><i class='fa fa-bullhorn'></i> Manuel Olay Ekle</button>
            </div>
        </div>
    </form>
</div>
</div>
<div class='alert alert-dismissable alert-info'> <i class='fa fa-moon-o'></i> <b>Aslı Orhan</b>, günü bitirdi.<i><small>&nbsp;&nbsp;&nbsp;"içerik tamamlandı, teslim edildi"</small></i> - <small>23.02.2022 (18:08)</small></div>
</td>
</tr>
</table>
</center>
<?php include "footer.php"; ?>
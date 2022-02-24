<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link href="assets/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">

    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-switch.css" rel="stylesheet">
    <link href="assets/css/bootstrap-multiselect.css" rel="stylesheet">
    <link href="assets/css/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/alertify.core.css">
    <link rel="stylesheet" href="assets/css/alertify.default.css" id="toggleCSS">
    <link rel="stylesheet" href="assets/css/fuelux.min.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <link rel="stylesheet" href="assets/css/datetime.css">
    <link rel="stylesheet" href="assets/css/bs3.css">
    <script src="https://kit.fontawesome.com/0bcd3cd97b.js" crossorigin="anonymous"></script>
</head>

<body>
    <center><br><br><br><br><br>
        <table border=0 width=700>
            <tr>
                <td>
                    <div class="flat-form">
                        <div class="header">
                            <h3>SODİGEM Görev Yönetim Arayüzü</h3>
                        </div>
                        <div class="content">
                            <form role="form" class="form-horizontal" action="islem.php" method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="inputEmail3">E-Posta</label>
                                    <div class="col-sm-10">
                                        <div class="input-group" data-validate="email">
                                            <input type="text" class="form-control" name="kullanici_mail" id="validate-email" placeholder="E-Posta" required>
                                            <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="inputPassword3">Parola</label>
                                    <div class="col-sm-10">
                                        <div class="input-group" data-validate="length" data-length="8">
                                            <input type="password" class="form-control" name="kullanici_parola" id="validate-length" placeholder="Parola" required>
                                            <span class="input-group-addon danger"><span class="fa fa-times"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button class="btn btn-info" type="submit" name="kullanicigiris" style='width:120;'>Giriş Yap</button>
                                        <a href='kayitformu.php'><button type="button" class="btn btn-warning" style='width:120;'>Kayıt Ol</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/icheck.js"></script>
    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-red',
                radioClass: 'iradio_flat-red'
            });
        });
    </script>
    <script src="assets/js/icheck.js"></script>
    <script src="assets/js/fuelux.min.js"></script>
    <script type="text/javascript">
        $('#myWizard').wizard();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
                var $form = $(this).closest('form'),
                    $group = $(this).closest('.input-group'),
                    $addon = $group.find('.input-group-addon'),
                    $icon = $addon.find('span'),
                    state = false;

                if (!$group.data('validate')) {
                    state = $(this).val() ? true : false;
                } else if ($group.data('validate') == "email") {
                    state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
                } else if ($group.data('validate') == 'phone') {
                    state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
                } else if ($group.data('validate') == "length") {
                    state = $(this).val().length >= $group.data('length') ? true : false;
                } else if ($group.data('validate') == "number") {
                    state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
                }

                if (state) {
                    $addon.removeClass('danger');
                    $addon.addClass('success');
                    $icon.attr('class', 'fa fa-check');
                } else {
                    $addon.removeClass('success');
                    $addon.addClass('danger');
                    $icon.attr('class', 'fa fa-times');
                }

                if ($form.find('.input-group-addon.danger').length == 0) {
                    $form.find('[type="submit"]').prop('disabled', false);
                } else {
                    $form.find('[type="submit"]').prop('disabled', true);
                }
            });
            $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
        });
    </script>
</body>

</html>
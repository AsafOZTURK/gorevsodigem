<center>Coded By <a href='#'>Mehmet Asaf ÖZTÜRK</a></center><br><br><br>
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
<script type="text/javascript" src="assets/bootstrap-switch.min.js"></script>
<script type="text/javascript">
    $(".switch-check").bootstrapSwitch();
</script>
<script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="assets/js/prettify.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        window.prettyPrint() && prettyPrint();

        $('#example1').multiselect();

        $('#example2').multiselect();

        $('#example3').multiselect({
            buttonClass: 'btn btn-link'
        });

        $('#example4').multiselect({
            buttonClass: 'btn btn-default btn-sm'
        });

        $('#example6').multiselect();

        $('#example9').multiselect({
            onChange: function(element, checked) {
                alert('Change event invoked!');
                console.log(element);
            }
        });

        for (var i = 1; i <= 100; i++) {
            $('#example11').append('<option value="' + i + '">Options ' + i + '</option>');
        }
        $('#example11').multiselect({
            maxHeight: 200
        })

        $('#example13').multiselect();

        $('#example14').multiselect({
            buttonText: function(options) {
                if (options.length === 0) {
                    return 'None selected <b class="caret"></b>';
                } else {
                    var selected = '';
                    options.each(function() {
                        selected += $(this).text() + ', ';
                    });
                    return selected.substr(0, selected.length - 2) + ' <b class="caret"></b>';
                }
            }
        });

        $('#example16').multiselect({
            onChange: function(option, checked) {
                if (checked === false) {
                    $('#example16').multiselect('select', option.val());
                }
            }
        });

        $('#example19').multiselect();

        $('#example20').multiselect({
            selectedClass: null
        });

        $('#example23').multiselect();

        $('#example24').multiselect();

        $('#example25').multiselect({
            dropRight: true,
        });

        $('#example27').multiselect({
            includeSelectAllOption: true
        });

        // Add options for example 28.
        for (var i = 1; i <= 100; i++) {
            $('#example28').append('<option value="' + i + '">' + i + '</option>');
        }

        $('#example28').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            maxHeight: 150
        });

        $('#example32').multiselect();

        $('#example39').multiselect({
            includeSelectAllOption: true,
            enableCaseInsensitiveFiltering: true
        });

        $('#example41').multiselect({
            includeSelectAllOption: true
        });

        for (var i = 1; i < 1000; i++) {
            $('#example45').append('<option value="' + i + '">Option ' + i + '</option>');
        }

        $('#example45').multiselect({
            includeSelectAllOption: true,
            maxHeight: 150
        });

        $('#example46').multiselect({
            checkboxName: 'multiselect-checkbox'
        });

        $('#example48').multiselect();

        $('#example51').multiselect({
            disableIfEmpty: true
        });
        $('#example51-rebuild').on('click', function() {
            $('#example51').multiselect('rebuild');
        });
        $('#example51-add').on('click', function() {
            $('#example51').append('<option value="cheese">Cheese</option><option value="tomato">Tomato</option>');
        });
        $('#example51-delete').on('click', function() {
            $('option[value="cheese"]', $('#example51')).remove();
            $('option[value="tomato"]', $('#example51')).remove();
        });
    });
</script>
<script src="assets/js/bootstrap-slider.js"></script>
<script type="text/javascript">
    var RGBChange = function() {
        $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
    };

    var r = $('#R').slider()
        .on('slide', RGBChange)
        .data('slider');
    var g = $('#G').slider()
        .on('slide', RGBChange)
        .data('slider');
    var b = $('#B').slider()
        .on('slide', RGBChange)
        .data('slider');
    $('#ex1').slider({
        formater: function(value) {
            return 'Current value: ' + value;
        }
    });
    $("#ex2").slider({});
    $("#ex4").slider({
        reversed: true
    });
    $("#ex41").slider({
        reversed: true
    });
    $("#ex42").slider({
        reversed: true
    });
    $("#ex43").slider({
        reversed: true
    });
    $("#ex44").slider({
        reversed: true
    });
    $("#ex45").slider({
        reversed: true
    });
    $("#ex46").slider({
        reversed: true
    });
    $("#ex47").slider({
        reversed: true
    });

    $("#ex6").slider();
    $("#ex6").on('slide', function(slideEvt) {
        $("#ex6SliderVal").text(slideEvt.value);
    });
    $("#ex9").slider({
        precision: 2,
        value: 8.115 // Slider will instantiate showing 8.12 due to specified precision
    });
</script>
<script type="text/javascript">
    (function() {

        var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function() {
            var html = $(this).parent().html();
            html = cleanSource(html);
            $("#source-modal pre").text(html);
            $("#source-modal").modal();
        });

        $('.bs-example [data-toggle="popover"]').popover();
        $('.bs-example [data-toggle="tooltip"]').tooltip();

        $(".bs-example").hover(function() {
            $(this).append($button);
            $button.show();
        }, function() {
            $button.hide();
        });

        function cleanSource(html) {
            var lines = html.split(/\n/);

            lines.shift();
            lines.splice(-1, 1);

            var indentSize = lines[0].length - lines[0].trim().length,
                re = new RegExp(" {" + indentSize + "}");

            lines = lines.map(function(line) {
                if (line.match(re)) {
                    line = line.substring(indentSize);
                }

                return line;
            });

            lines = lines.join("\n");

            return lines;
        }
    })();
</script>
</body>

</html>
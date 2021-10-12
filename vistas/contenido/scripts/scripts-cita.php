<script src="<?php echo SERVERURL; ?>vistas/assets/js/jquery-2.1.4.min.js"></script>

<script src="<?php echo SERVERURL; ?>vistas/assets/js/citas.js"></script>



<!-- <![endif]-->

<!--para cargar vista mobil -->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo SERVERURL; ?>vistas/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>




<script src="<?php echo SERVERURL; ?>vistas/assets/js/bootstrap.min.js">
</script>

<!-- script de puglin especificos de la pagina -->

<!-- ace scripts(plantilla) -->
<script src="<?php echo SERVERURL; ?>vistas/assets/js/ace-elements.min.js"></script>

<script src="<?php echo SERVERURL; ?>vistas/assets/js/ace.min.js"></script>

<!-- para los campos de fecha -->
<script src="<?php echo SERVERURL; ?>vistas/assets/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo SERVERURL; ?>vistas/assets/js/bootstrap-timepicker.min.js"></script>

<!-- para mascara de los campos de fecha -->
<script src="<?php echo SERVERURL; ?>vistas/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/js/daterangepicker.min.js"></script>

<script src="<?php echo SERVERURL; ?>vistas/assets/js/select2.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/js/sweetalert2.min.js"></script>

<!-- script en línea relacionados con esta página -->
<script type="text/javascript">
    jQuery(function($) {




        var $sidebar = $('.sidebar').eq(0);
        if (!$sidebar.hasClass('h-sidebar')) return;

        $(document).on('settings.ace.top_menu', function(ev, event_name, fixed) {
            if (event_name !== 'sidebar_fixed') return;

            var sidebar = $sidebar.get(0);
            var $window = $(window);

            //return if sidebar is not fixed or in mobile view mode
            var sidebar_vars = $sidebar.ace_sidebar('vars');
            if (!fixed || (sidebar_vars['mobile_view'] || sidebar_vars['collapsible'])) {
                $sidebar.removeClass('lower-highlight');
                //restore original, default marginTop
                sidebar.style.marginTop = '';

                $window.off('scroll.ace.top_menu')
                return;
            }


            var done = false;
            $window.on('scroll.ace.top_menu', function(e) {

                var scroll = $window.scrollTop();
                scroll = parseInt(scroll / 4); //move the menu up 1px for every 4px of document scrolling
                if (scroll > 17) scroll = 17;


                if (scroll > 16) {
                    if (!done) {
                        $sidebar.addClass('lower-highlight');
                        done = true;
                    }
                } else {
                    if (done) {
                        $sidebar.removeClass('lower-highlight');
                        done = false;
                    }
                }

                sidebar.style['marginTop'] = (17 - scroll) + 'px';
            }).triggerHandler('scroll.ace.top_menu');

        }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);

        $(window).on('resize.ace.top_menu', function() {
            $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
        });
        // para cargar componenete popover que muestra +datos de paciente
        $('[data-rel=popover]').popover({
            html: true
        });

        $('[data-rel=tooltip]').tooltip();

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            startDate: '+0d'
        });

        $.mask.definitions['~'] = '[+-]';

        $('.telefono').mask('9999-9999');

        $('.input-daterange').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });

        $('#horacita').timepicker({
            minuteStep: 30,
            hourStep: 1,
            showSeconds: false,
            showMeridian: true,
            disableFocus: true,
            icons: {
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down'
            }
        }).on('focus', function() {
            $('#timepicker1').timepicker('showWidget');
        }).next().on(ace.click_event, function() {
            $(this).prev().focus();
        });


    });
</script>
<script src="<?php echo SERVERURL;?>vistas/assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--para cargar vista mobil -->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo SERVERURL;?>vistas/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>




    <script src="<?php echo SERVERURL;?>vistas/assets/js/bootstrap.min.js">
    </script>

    <!-- script de puglin especificos de la pagina -->

    <!-- ace scripts(plantilla) -->
    <script src="<?php echo SERVERURL;?>vistas/assets/js/ace-elements.min.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/ace.min.js"></script>

    <!-- para los campos de fecha -->
    <script src="<?php echo SERVERURL;?>vistas/assets/js/bootstrap-datepicker.min.js"></script>

    <script src="<?php echo SERVERURL;?>vistas/assets/js/bootstrap-timepicker.min.js"></script>

    <!-- para mascara de los campos de fecha -->
    <script src="<?php echo SERVERURL;?>vistas/assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/daterangepicker.min.js"></script>

	<script src="<?php echo SERVERURL;?>vistas/assets/js/select2.min.js"></script>
	
	<script src="<?php echo SERVERURL; ?>vistas/assets/js/sweetalert2.min.js"></script>

	<script src="<?php echo SERVERURL;?>vistas/assets/js/consulta.js"></script>

	<script src="<?php echo SERVERURL;?>vistas/assets/js/chosen.jquery.min.js"></script>

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
                todayHighlight: true
            });

            $.mask.definitions['~'] = '[+-]';

            $('.input-mask-date').mask('99/99/9999');

            $('.input-daterange').datepicker({autoclose:true});
			
            $('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: false,
					showMeridian: true,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
                $('.select2').css('width','100%').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});



                $('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'suelte las imágenes de examenes aquí o haga clic para elegir',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});

                $.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('999/999 mmHg');
				$('.input-mask-phone').mask('999 ppm');
                $('.input-mask-temo').mask('99 °C');
                $('.input-mask-peso').mask('999 Kg');
                $('.input-mask-esta').mask('999 cm');
                $('.input-mask-dia').mask('99 d');

				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');

				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': 800});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

        });
    </script>

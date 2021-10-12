<script src="<?php echo SERVERURL;?>vistas/assets/js/jquery-2.1.4.min.js"></script>

<script src="<?php echo SERVERURL; ?>vistas/assets/js/sweetalert2.min.js"></script>

<script src="<?php echo SERVERURL;?>vistas/assets/js/login.js"></script>


<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo SERVERURL;?>vistas/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>


<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });

             $( "body" ).addClass( "login-layout" );
             $( "body" ).css("background-image", "url('http://localhost/SICMEFAM/vistas/fondo1	.jpg')");
             $( "body" ).css("background-repeat","no-repeat");
             $( "body" ).css("background-position","center");
            


			 
			});
		</script>
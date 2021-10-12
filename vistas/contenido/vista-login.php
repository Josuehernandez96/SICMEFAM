<div class="main-container">
	<div class="main-content">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="login-container">
					<div class="center">
						<h1>
							
							<i><img src="<?php echo SERVERURL; ?>vistas/cmfam.png" height="150" alt="150"></i>
							<span class="white" id="id-text2"></span>
						</h1>
					</div>

					<div class="space-6"></div>

					<div class="position-relative" style="opacity: 0.85">
						<div id="login-box" class="login-box visible widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header blue lighter bigger; text-center">
										
										INICIO DE SESION
									</h4>

									<div class="space-6"></div>
									<div class="space"></div>

									<form autocomplete="off">
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" class="form-control" name="usuario" placeholder="Ingrese su usuario" />
													<i class="ace-icon fa fa-user"></i>
													<div id="usuario-error" style="color:red;display:none" class="help-block">Campo requerido</div>

												</span>
											</label>
											
											

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" name="clave" placeholder="ingrese su contraseña" />
													<i class="ace-icon fa fa-lock"></i>
													<div id="clave-error" style="color:red;display:none" class="help-block">Campo requerido</div>
												</span>
											</label>

											<div class="space"></div>

											<div class="clearfix">


												<button type="button" name="botonlogin"  class="width-50 pull-left btn-lg btn btn-sm btn-round  btn-primary">
													
													<span class="bigger-110" id="texto-btn-iniciar">INGRESAR</span>
												</button>

												<i class="ace-icon fa fa-spinner fa-spin green bigger-230 pull-right" style="display:none"  id="cargando"></i>
											</div>

											<div class="space-4"></div>
										</fieldset>
									</form>



								</div><!-- /.widget-main -->



								<div class="toolbar center" style="background: #1698C8 ;padding: 5px;">
									<a href="#" data-target="#forgot-box" class="forgot-password-link">
										<strong style="color: #ffff;font-size: 15px">¿Olvido su Contraseña ?</strong>

									</a>
								</div>



							</div><!-- /.widget-body -->
						</div><!-- /.login-box -->

						<div id="forgot-box" class="forgot-box widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header red lighter bigger, text-center">
										
										RECUPERACION DE CONTRASEÑA
									</h4>

									<div class="space-6"></div>
									<p>
										Ingrese correo electronico del usuario para contactar recuperacion
									</p>

									<form autocomplete="off">
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="email" class="form-control"  name="correousuario" placeholder="Correo de usuario" />
													<i class="ace-icon fa fa-envelope"></i>
												</span>
											</label>

											<div class="clearfix">
												<button type="button" class="width-35 pull-left btn btn-sm btn-danger" id="btnenviar">
													
													<span class="bigger-110">Enviar</span>
												</button>
												<i class="ace-icon fa fa-spinner fa-spin green bigger-230 pull-right" style="display:none"  id="cargando2"></i>
											</div>
											
										</fieldset>
									</form>
								</div><!-- /.widget-main -->

								<div class="toolbar center" style="background: #E95207">
									<a href="#" data-target="#login-box" class="back-to-login-link">
										<strong style="color: #ffff;font-size: 15px">
											Regresar a Inicio</strong>


									</a>
								</div>
							</div><!-- /.widget-body -->
						</div><!-- /.forgot-box -->

						<div id="signup-box" class="signup-box widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header green lighter bigger">
										<i class="ace-icon fa fa-users blue"></i>
										New User Registration
									</h4>

									<div class="space-6"></div>
									<p> Enter your details to begin: </p>

									<form>
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="email" class="form-control" placeholder="Email" />
													<i class="ace-icon fa fa-envelope"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" class="form-control" placeholder="Username" />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" placeholder="Password" />
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" placeholder="Repeat password" />
													<i class="ace-icon fa fa-retweet"></i>
												</span>
											</label>

											<label class="block">
												<input type="checkbox" class="ace" />
												<span class="lbl">
													I accept the
													<a href="#">User Agreement</a>
												</span>
											</label>

											<div class="space-24"></div>

											<div class="clearfix">
												<button type="reset" class="width-30 pull-left btn btn-sm">
													<i class="ace-icon fa fa-refresh"></i>
													<span class="bigger-110">Reset</span>
												</button>

												<button type="button" class="width-65 pull-right btn btn-sm btn-success">
													<span class="bigger-110">Register</span>

													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</fieldset>
									</form>
								</div>

								<div class="toolbar center">
									<a href="#" data-target="#login-box" class="back-to-login-link">
										<i class="ace-icon fa fa-arrow-left"></i>
										Back to login
									</a>
								</div>
							</div><!-- /.widget-body -->
						</div><!-- /.signup-box -->
					</div><!-- /.position-relative -->


				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.main-content -->
</div>

<?php

include 'scripts/scripts-login.php';
?>
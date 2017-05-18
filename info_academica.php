<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SAT</title>
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/SAT_Icfes_Academico.css" rel="stylesheet">
		<link href="css/info_academica.css" rel="stylesheet">
		<script src="js/jquery-1.12.4.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="sftp-config.json"></script>
		<script>
			$(document).ready(function()
			{
			   $("a[href*='#LayoutGrid4']").click(function(event)
			   {
			      event.preventDefault();
			      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid4').offset().top }, 600, 'swing');
			   });
			});
		</script>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300i" rel="stylesheet">
	</head>
	<body>
		<div id="wb_LayoutGrid1">
			<form name="LayoutGrid1" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="LayoutGrid1">
				<div class="col-1">
					<hr id="Line2">
					<hr id="Line3">
				</div>
				<div class="col-2">
					<hr id="Line1">
					<div id="wb_tx_titulo">
						<span style="color:#000000;font-family:'Comic Sans MS';font-size:24px;">Sistema de Alertas Tempranas de Unisangil SAT<br></span><span style="color:#000000;font-family:'Comic Sans MS';font-size:15px;">Unidad de Permanencia y Graduación Estudiantil&nbsp; Sede San Gil<br>Módulo Caracterización Personal</span>
					</div>
					<input type="submit" id="bt_cerrar_sesion" name="Cerrar_sesion" value="Cerrar Sesión">
					<hr id="Line11">
				</div>
			</form>

		<?php
			$conn = oci_connect('satuser','satuser','localhost/orcl');
			if (!$conn)
				{
				    $e = oci_error();
				    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}
		?>
		<div id="wb_LayoutGrid2">
			<div id="LayoutGrid2">
				<div class="col-1">
					<hr id="Line9">
					<div id="wb_FontAwesomeIcon4">
						<div id="FontAwesomeIcon4"><i class="fa fa-user">&nbsp;</i></div>
					</div>
					<div id="wb_Text6">
						<span style="color:#000000;">Info. Personal</span>
					</div>
				</div>
				<div class="col-2">
					<hr id="Line8">
					<div id="wb_FontAwesomeIcon5">
						<div id="FontAwesomeIcon5"><i class="fa fa-users">&nbsp;</i></div>
					</div>
					<div id="wb_Text2">
						<span style="color:#000000;">Info. Familiar</span>
					</div>
				</div>
				<div class="col-3">
					<hr id="Line7">
					<div id="wb_FontAwesomeIcon3">
						<div id="FontAwesomeIcon3"><i class="fa fa-book">&nbsp;</i></div>
					</div>
					<div id="wb_Text3">
						<span style="color:#000000;">Info. Académica</span>
					</div>
				</div>
				<div class="col-4">
					<hr id="Line5">
					<div id="wb_FontAwesomeIcon2">
						<div id="FontAwesomeIcon2"><i class="fa fa-dollar">&nbsp;</i></div>
					</div>
					<div id="wb_Text4">
						<span style="color:#000000;">Info. Fínanciera</span>
					</div>
				</div>
				<div class="col-5">
					<hr id="Line6">
					<div id="wb_FontAwesomeIcon1">
						<div id="FontAwesomeIcon1"><i class="fa fa-hourglass">&nbsp;</i></div>
					</div>
					<div id="wb_Text5">
						<span style="color:#000000;">Info. Histórica</span>
					</div>
				</div>
			</div>
		</div>
		<div id="wb_LayoutGrid3">
			<div id="LayoutGrid3">
				<div class="row">
					<div class="col-1">
						<hr id="Line10">
					</div>
				</div>
			</div>
		</div>
		<form name="form_identificacion" method="post" action="php/form_inf_academica.php" id="LayoutGrid4">
			<div id="wb_LayoutGrid4">
				<div id="wb_tx_Nombre_sede">
					<span style="color:#000000;">Nombre de la Sede: *</span>
				</div>
				<select type="text" name="Nomb_sede" size="1" id="box_Sede">
					<option selected>SELECCIONE</option>
					<?php
						$consulta = oci_parse($conn, "SELECT nombre_sede FROM sedes order by nombre_sede asc");
						oci_execute($consulta);
						while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
							{
								$string_consulta=implode($row);
								echo "<option>$string_consulta</option>";
							}
					?>
				</select>
				<div id="wb_LayoutGrid5">
					<div id="LayoutGrid5">
						<div class="col-2">
							<label for="box_tipo_doc" id="la_tipo_doc">Tipo Documento de Identificación: *</label>
							<select type="text" name="tipo_documento" size="1" id="box_tipo_doc">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT td_descripcion FROM tipo_documento order by td_descripcion asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											$string_consulta=implode($row);
											echo "<option>$string_consulta</option>";
										}
								?>
							</select>
							<label for="box_tipo_doc" id="la_num_doc">Número Documento de Identificación: *</label>
							<input type="text" id="etx_num_doc" name="n_doc_iden" spellcheck="false" placeholder="Número de Documento">
							<label for="etx_fec_exp_doc" id="la_fec_ex_doc">Fecha de expedición Documento:</label>
							<input type="date" id="etx_fec_exp_doc" name="f_exp_docm" value="" spellcheck="false" placeholder="dd/mm/aaaa">
						</div>
						<div class="col-2">
							<label for="etx_fec_exp_doc" id="la_pri_nombre">Primer Nombre: *</label>
							<input type="text" id="etx_pri_nombre" name="Primer_nombre" value="" spellcheck="false" placeholder="Primer Nombre">
							<label for="etx_fec_exp_doc" id="la_seg_nombre">Segundo Nombre:</label>
							<input type="text" id="etx_seg_nombre" name="Segundo_nombre" value="" spellcheck="false" placeholder="Segundo Nombre">
							<label for="etx_fec_exp_doc" id="la_pri_apellido">Primer Apellido: *</label>
							<input type="text" id="etx_pri_apellido" name="Primer_apellido" value="" spellcheck="false" placeholder="Primer Apellido">
							<label for="etx_fec_exp_doc" id="la_seg_apellido">Segundo Apellido:</label>
							<input type="text" id="etx_seg_apellido" name="Segundo_apellido" value="" spellcheck="false" placeholder="Segundo Apellido">
						</div>
					</div>
				</div>			
				<div id="wb_tx_inf_bachiller">
					<span style="color:#000000;"><strong>Información de Bachillerato</strong></span>
				</div>	
				<div id="wb_LayoutGrid7">
					<div id="LayoutGrid7">
						<div class="col-1">
							<div id="wb_tx_nom_colegio">
								<span style="color:#000000;">Nombre Colegio donde terminó estudios: *</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="i_nombre_colegio" id="box_tipo_doc">
								<option selected>SELECCIONE</option>
								<?php
								$consulta = oci_parse($conn, "SELECT colegio_descr FROM colegios order by colegio_descr asc");
								oci_execute($consulta);
								while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
									{
										$string_consulta=implode($row);
										echo "<option>$string_consulta</option>";
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid8">
					<div id="LayoutGrid8">
						<div class="col-1">
							<div id="wb_tx_jor_estudio">
								<span style="color:#000000;">Jornada de Estudio: *</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="Jornada_Estudio" size="1" id="box_jor_estudio">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT jornada_nombre FROM jornada order by jornada_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											$string_consulta=implode($row);
											echo "<option>$string_consulta</option>";
										}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid9">
					<div id="LayoutGrid9">
						<div class="col-1">
							<div id="wb_tx_cal_estudio">
								<span style="color:#000000;">Calendario de Estudio: *</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="calendario" size="1" id="box_jor_estudio">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT calendario_nombre FROM calendario order by calendario_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											$string_consulta=implode($row);
											echo "<option>$string_consulta</option>";
										}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid10">
					<div id="LayoutGrid10">
						<div class="col-1">
							<div id="wb_tx_tipo_colegio">
							<span style="color:#000000;">Tipo de Colegio:</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="tipo_colegio" size="1" id="box_tip_colegio">
								<option selected>SELECCIONE</option>
								<option>Privado</option>
								<option>Publico</option>
							</select>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid11">
					<div id="LayoutGrid11">
						<div class="col-1">
							<div id="wb_tx_especialidad">
							<span style="color:#000000;">Especialidad: *</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="especialidad" size="1" id="box_especialidad">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT especialidad_nombre FROM especialidad_colegio order by especialidad_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											$string_consulta=implode($row);
											echo "<option>$string_consulta</option>";
										}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid12">
					<div id="LayoutGrid12">
						<div class="col-1">
							<div id="wb_tx_metodolo">
								<span style="color:#000000;">Metodología: *</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="metodologia" size="1" id="box_metodologia">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT mebac_nombre FROM metodologia_bachillerato order by mebac_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											$string_consulta=implode($row);
											echo "<option>$string_consulta</option>";
										}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid13">
					<div id="LayoutGrid13">
						<div class="col-1">
							<div id="wb_tx_idioma">
								<span style="color:#000000;">Idioma: *</span>
							</div>
						</div>
						<div class="col-2">
							<div id="wb_LayoutGrid14">
								<div id="LayoutGrid14" name="idiomaa">
									<select type="text" name="idioma" size="1" id="box_metodologia">
										<option selected>SELECCIONE</option>
											<?php
												$consulta = oci_parse($conn, "SELECT idioma_nombre FROM idioma_bach order by idioma_nombre asc");
												oci_execute($consulta);
												while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
													{
														$string_consulta=implode($row);
														echo "<option>$string_consulta</option>";
													}
											?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid15">
					<div id="LayoutGrid15">
						<div class="col-1">
							<div id="wb_tx_valor_pension">
								<span style="color:#000000;">Valor Pensión (valor mensual al graduarse):</span>
							</div>
						</div>
						<div class="col-2">
							<input type="text" id="etx_valor_pension" name="Valor_pension" value="" spellcheck="false" placeholder="Valor Pensi&#243;n">
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid16">
					<div id="LayoutGrid16">
						<div class="col-1">
							<div id="wb_tx_valid_bachiller">
								<span style="color:#000000;">¿Validó el Bachillerato?:</span>
							</div>
						</div>
						<div class="col-2">
							<div id="wb_LayoutGrid17">
								<div id="LayoutGrid17" name="bachillerato">
									<select type="text" name="bachillerato_valido" size="1" id="box_metodologia">
										<option selected>SELECCIONE</option>
									    <option selected>SI</option>
									    <option>NO</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid18">
					<div id="LayoutGrid18">
						<div class="col-1">
							<div id="wb_tx_cod_pre_pruebas">
								<span style="color:#000000;">Código Presentación de las Pruebas SABER 11:</span>
							</div>
						</div>
						<div class="col-2">
							<input type="text" id="etx_cod_snp" name="Codigo_snp" value="" spellcheck="false" placeholder="Codigo SNP">
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid19">
					<div id="LayoutGrid19">
						<div class="col-1">
							<div id="wb_tx_fec_prese_examen">
								<span style="color:#000000;">Fecha de Presentación de Examen:</span>
							</div>
						</div>
						<div class="col-2">
							<input type="date" id="etx_fech_pre_examen" name="presentacion_examen" value="" spellcheck="false" placeholder="dd/mm/aaaa">
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid20">
					<div id="LayoutGrid20">
						<div class="col-1">
							<div id="wb_tx_pun_saber">
								<span style="color:#000000;">Puntaje de las Pruebas SABER 11:</span>
							</div>
						</div>
						<div class="col-2">
							<input type="text" id="etx_punt_saber" name="puntaje_saber_11" value="" spellcheck="false" placeholder="Puntaje Saber 11">
						</div>
					</div>
				</div>
				<div id="wb_LayoutGrid20">
					<div id="LayoutGrid20">
						<div class="col-1">
							<div id="wb_tx_pun_saber">
								<span style="color:#000000;">Tiempo Ingreso Universidad: *</span>
							</div>
						</div>
						<div class="col-2">
							<select type="text" name="tiem_ingr_uni" size="1" id="box_metodologia">
								<option selected>SELECCIONE</option>
									<?php
										$consulta = oci_parse($conn, "SELECT tiempo_ingreso_nombre FROM tiempo_ingreso_u order by tiempo_ingreso_nombre asc");
										oci_execute($consulta);
										while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
											{
												$string_consulta=implode($row);
												echo "<option>$string_consulta</option>";
											}
									?>
							</select>
						</div>
					</div>
				</div>
				<br>
				<span>Campos con * son obligatorios</span>
				<br>
				<div id="wb_LayoutGrid21">
					<div id="LayoutGrid21">
						<div class="col-1">
							<input type="submit" name="botton_accion" value="registrar">
						</div>
						<div class="col-2">
							<input type="submit" name="botton_accion" value="modificar">
						</div>
						<div class="col-3">
							<input type="submit" id="bt_Volver" name="Volver" value="Volver">
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
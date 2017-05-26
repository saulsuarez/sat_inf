<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SAT</title>
	</head>
	<body>
		<?php
/*creacion incremento en oracle
	CREATE SEQUENCE id_bachillerato
	INCREMENT BY 1
	START WITH 0
	MAXVALUE 9999 MINVALUE 0 CYCLE ORDER;
*/
/*creacion tabla tipo documentos 
	CREATE TABLE TIPO_DOCUMENTO
	(TD_CODE VARCHAR2 (2) NOT NULL ,
	TD_DESCRIPCION VARCHAR2 (50)) ;
	ALTER TABLE TIPO_DOCUMENTO ADD CONSTRAINT TIPO_DOCUMENTO_PK PRIMARY KEY ( TD_CODE ) ;
	ALTER TABLE PERSONA ADD CONSTRAINT PERSONA_TIPO_DOCUMENTO_FK FOREIGN KEY ( TIPO_DOC ) REFERENCES TIPO_DOCUMENTO ( TD_CODE ) ;
	Insert into TIPO_DOCUMENTO (TD_CODE,TD_DESCRIPCION) values ('CC','CEDULA DE CIUDADANIA');
	Insert into TIPO_DOCUMENTO (TD_CODE,TD_DESCRIPCION) values ('DE','DOCUMENTO DE IDENTIDAD EXTRANJERA');
	Insert into TIPO_DOCUMENTO (TD_CODE,TD_DESCRIPCION) values ('CE','CEDULA DE EXTRANJERIA');
	Insert into TIPO_DOCUMENTO (TD_CODE,TD_DESCRIPCION) values ('TI','TARJETA DE IDENTIDAD');
	Insert into TIPO_DOCUMENTO (TD_CODE,TD_DESCRIPCION) values ('PS','PASAPORTE');
	Insert into TIPO_DOCUMENTO (TD_CODE,TD_DESCRIPCION) values ('CA','CERTIFICADO DE CABILDO');
	commit;
*/
			$conn = oci_connect('satuser','satuser','localhost/orcl','AL32UTF8');
			if (!$conn)
				{
						$e = oci_error();
						trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}
			$persona_array=0;
			$sede_array0=0;
			$td_array0=0;
			if((array_key_exists('botton_accion',$_POST)?$_POST['botton_accion']:"")==("buscar" or "registrar" or "buscar")){
				$consulta = oci_parse($conn, "SELECT PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,COD_SEDE,TIPO_DOC,NUM_DOCUMENTO FROM PERSONA where '".$_POST['n_doc_iden']."' = NUM_DOCUMENTO");
				oci_execute($consulta);
				$persona_array = oci_fetch_array($consulta);
				$consulta = oci_parse($conn, "SELECT NOMBRE_SEDE,CODIGO_SEDE FROM SEDES where '".$persona_array['COD_SEDE']."' = CODIGO_SEDE");
				oci_execute($consulta);
				$sede_array0 = oci_fetch_array($consulta);
				$consulta = oci_parse($conn, "SELECT TD_DESCRIPCION,TD_CODE FROM TIPO_DOCUMENTO where '".$persona_array['TIPO_DOC']."' = TD_CODE");
				oci_execute($consulta);
				$td_array0 = oci_fetch_array($consulta);
			}
			if((array_key_exists('botton_accion',$_POST)?$_POST['botton_accion']:"")=="registrar"){
//validad si ya hay un informe de ese estudiante
				$cons_validacion = "select estudiante_num_documento from info_bachillerato where '".$_POST['n_doc_iden']."'=estudiante_num_documento";
				$consulta=oci_parse($conn,$cons_validacion);
				oci_execute($consulta);
				$registrar_array=oci_fetch_array($consulta);
				if(""==$registrar_array['ESTUDIANTE_NUM_DOCUMENTO']){
/*validacion de la informacion hacerca de si el tipo de documento, el numero de documento
	y el codigo de la sede perteneses a un usuario registrado previamente y si ese usuario posee
	ese tipo de documento y a esa sede*/
					$contador=0;
					$cons_validacion = "select cod_sede, tipo_doc, num_documento from estudiante where '".$_POST['n_doc_iden']."'=num_documento";
					$consulta=oci_parse($conn,$cons_validacion);
					oci_execute($consulta);
					$registrar_array=oci_fetch_array($consulta);
					if($persona_array['NUM_DOCUMENTO']!=$registrar_array['NUM_DOCUMENTO']){
						echo '<script language="javascript">alert("el numero de documento no pertenese a un estudiante");</script>';
						$contador++;
					}
					if($persona_array['COD_SEDE']!=$registrar_array['COD_SEDE']){
						echo '<script language="javascript">alert("este estudiante no esta registrado en la sede seleccionada");</script>'; 
						$contador++;
					}
					if($persona_array['TIPO_DOC']!=$registrar_array['TIPO_DOC']){
						echo '<script language="javascript">alert("este tipo de documento no pertenese a este usuario");</script>'; 
						$contador++;
					}
					if($contador==0){
						$insercion = "INSERT INTO INFO_BACHILLERATO (INFO_BACHILLERATO_ID,ESTUDIANTE_COD_SEDE,ESTUDIANTE_TIPO_DOC,ESTUDIANTE_NUM_DOCUMENTO,COLEGIO_CODE,JORNADA_ID,CALENDARIO_ID,TIPO_COLEGIO,ESPECIALIDAD_COL_CODE,MEBAC_ID,IDIOMA_BACH_ID,VALOR_PENSION,VALIDO_BACH,CODIGO_SABER11,FECHA_SABER11,PUNTAJE_TOTAL_SABER11,TIEMPO_INGRESO_ID) VALUES (id_bachillerato.NextVal,'".$registrar_array['COD_SEDE']."','".$persona_array['TIPO_DOC']."','".$_POST['n_doc_iden']."','".$_POST['o_colegio']."','".$_POST['o_jornada_estudio']."','".$_POST['o_calendario']."','".$_POST['o_tipo_colegio']."','".$_POST['o_especialidad']."','".$_POST['o_metodologia']."','".$_POST['o_idioma']."','".$_POST['o_costo_pension']."','".$_POST['o_bachillerato_valido']."','".$_POST['o_codigo_snp']."',to_date('".$_POST['o_presentacion_examen']."','RRRR/MM/DD'),'".$_POST['o_puntaje_saber_11']."','".$_POST['o_tiem_ingr_uni']."')";
						$stid = oci_parse($conn,$insercion);
						oci_execute($stid);
						echo '<script language="javascript">alert("Informe Registrado\n¡¡¡GOOD!!!");</script>'; 
					}else{
						echo '<script language="javascript">alert("no se pudo guardar el informe\n!!!ERROR¡¡¡");</script>'; 
					}
				}else{
						echo '<script language="javascript">alert("este usuario ya fue registrado");</script>'; 
				}
			}
			if((array_key_exists('botton_accion',$_POST)?$_POST['botton_accion']:"")==("modificar")){
				$cons_validacion = "select cod_sede, tipo_doc, num_documento from estudiante where '".$_POST['n_doc_iden']."'=num_documento";
				$consulta=oci_parse($conn,$cons_validacion);
				oci_execute($consulta);
				$registrar_array=oci_fetch_array($consulta);
				$update = "UPDATE INFO_BACHILLERATO SET ESTUDIANTE_COD_SEDE='".$registrar_array['COD_SEDE']."',ESTUDIANTE_TIPO_DOC='".$persona_array['TIPO_DOC']."',ESTUDIANTE_NUM_DOCUMENTO='".$_POST['n_doc_iden']."',COLEGIO_CODE='".$_POST['o_colegio']."',JORNADA_ID='".$_POST['o_jornada_estudio']."',CALENDARIO_ID='".$_POST['o_calendario']."',TIPO_COLEGIO='".$_POST['o_tipo_colegio']."',ESPECIALIDAD_COL_CODE='".$_POST['o_especialidad']."',MEBAC_ID='".$_POST['o_metodologia']."',IDIOMA_BACH_ID='".$_POST['o_idioma']."',VALOR_PENSION='".$_POST['o_costo_pension']."',VALIDO_BACH='".$_POST['o_bachillerato_valido']."',CODIGO_SABER11='".$_POST['o_codigo_snp']."',FECHA_SABER11= to_date('".$_POST['o_presentacion_examen']."','RRRR/MM/DD'),PUNTAJE_TOTAL_SABER11='".$_POST['o_puntaje_saber_11']."',TIEMPO_INGRESO_ID='".$_POST['o_tiem_ingr_uni']."' WHERE ESTUDIANTE_NUM_DOCUMENTO='".$_POST['n_doc_iden']."'";
				$stid = oci_parse($conn,$update);
				oci_execute($stid);
				echo '<script language="javascript">alert("Informe Actualizado");</script>'; 
			}
		?>
		<form method="post" action="">
			<table style="width:100%">
				<caption>Inf Académico</caption>
				<tr><th colspan='2'>Infomacion Personal</th></tr>
				<tr><th>Numero Documento de Identificación</th>
					<th><input type='number' min='0' max='99999999999999999999999999999' name='n_doc_iden' placeholder='Número_de_Documento' value="<?php echo $_POST['n_doc_iden']; ?>"></th></tr>
				<tr><th>Tipo Documento de Identificación</th>
					<th><label type='text' name='tipo_doc' disabled='true' value=""><?php echo $td_array0['TD_DESCRIPCION']; ?></label></th></tr>
				<tr><th>Nombre de Sede</th>
					<th><label type='text' name='nomb_sede' disabled='true' value=""><?php echo $sede_array0['NOMBRE_SEDE']; ?></label></th></tr>
				<tr><th>Primer Nombre</th>
					<th><label type='text' name='pri_nom' disabled='true' value=""><?php echo $persona_array['PRIMER_NOMBRE']; ?></label></th></tr>
				<tr><th>Segundo Nombre</th>
					<th><label type='text' name='seg_nom' disabled='true' value=""><?php echo $persona_array['SEGUNDO_NOMBRE']; ?></label></th></tr>
				<tr><th>Primer Apellido</th>
					<th><label type='text' name='pri_ape' disabled='true' value=""><?php echo $persona_array['PRIMER_APELLIDO']; ?></label></th></tr>
				<tr><th>Segundo Apellido</th>
					<th><label type='text' name='seg_ape' disabled='true' value=""><?php echo $persona_array['SEGUNDO_APELLIDO']; ?></label></th></tr>
				<tr><th colspan="2"><input type="submit" name="botton_accion" value="buscar" style="padding:5px;margin:0px 0px 10px 0px;"></th></tr>
				<tr><th colspan="2">Información de Bachillerato</th></tr>
				<tr>
					<th>Nombre Colegio donde terminó estudios: *</th>
					<th><select type="text" name="o_colegio">
								<option selected>SELECCIONE</option>
								<?php
								header('Content-Type: text/html; charset=UTF-8');
								$consulta = oci_parse($conn, "SELECT COLEGIO_DESCR,COLEGIO_CODE FROM colegios order by colegio_descr asc");
								oci_execute($consulta);
								while ($row = oci_fetch_array($consulta,OCI_ASSOC+OCI_RETURN_NULLS)) 
									{
										echo "<option value='".$row['COLEGIO_CODE']."'>".$row['COLEGIO_DESCR']."</option>";
									}
								?>
						</select>
					</th>
				</tr>
				<tr>
					<th>Jornada de Estudio: *</th>
					<th><select type="text" name="o_jornada_estudio" size="1">
						<option selected>SELECCIONE</option>
						<?php
							$consulta = oci_parse($conn, "SELECT jornada_nombre,JORNADA_ID FROM jornada order by jornada_nombre asc");
							oci_execute($consulta);
							while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
								{
									echo "<option value='".$row['JORNADA_ID']."'>".$row['JORNADA_NOMBRE']."</option>";
								}
						?>
						</select>
					</th>
				</tr>
				<tr>
					<th>Calendario de Estudio: *</th>
					<th><select type="text" name="o_calendario" size="1">
							<option selected>SELECCIONE</option>
							<?php
								$consulta = oci_parse($conn, "SELECT calendario_nombre,CALENDARIO_ID FROM calendario order by calendario_nombre asc");
								oci_execute($consulta);
								while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
									{
										echo "<option value='".$row['CALENDARIO_ID']."'>".$row['CALENDARIO_NOMBRE']."</option>";
									}
							?>
						</select>
					</th>
				</tr>
				<tr>
					<th>Tipo de Colegio:</th>
					<th><select type="text" name="o_tipo_colegio" size="1">
						<option selected>SELECCIONE</option>
						<option>Privado</option>
						<option>Publico</option>
					</select></th>
				</tr>
				<tr>
					<th>Especialidad: *</th>
					<th><select type="text" name="o_especialidad" size="1">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT especialidad_nombre,ESPECIALIDAD_CODE FROM especialidad_colegio order by especialidad_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											echo "<option value='".$row['ESPECIALIDAD_CODE']."'>".$row['ESPECIALIDAD_NOMBRE']."</option>";
										}
								?>
						</select>
					</th>
				</tr>
				<tr>
					<th>Metodología: *</th>
					<th><select type="text" name="o_metodologia" size="1">
								<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT mebac_nombre,MEBAC_ID FROM metodologia_bachillerato order by mebac_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											echo "<option value='".$row['MEBAC_ID']."'>".$row['MEBAC_NOMBRE']."</option>";
										}
								?>
						</select>
					</th>
				</tr>
				<tr>
					<th>Idioma: *</th>
					<th><select type="text" name="o_idioma" size="1">
							<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT idioma_nombre,IDIOMA_ID FROM idioma_bach order by idioma_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											echo "<option value='".$row['IDIOMA_ID']."'>".$row['IDIOMA_NOMBRE']."</option>";
										}
								?>
						</select>
					</th>
				</tr>
				<tr>
					<th>Valor Pensión (valor mensual al graduarse):</th>
					<th><input type="number" min="0" max="9999999999" name="o_costo_pension" value="" spellcheck="false" placeholder="Valor Pensi&#243;n"></th>
				</tr>
				<tr>
					<th>Validó el Bachillerato:</th>
					<th><select type="text" name="o_bachillerato_valido" size="1">
							<option selected>SELECCIONE</option>
						    <option>SI</option>
						    <option>NO</option>
						</select>
					</th>
				</tr>
				<tr>
					<th>Código Presentación de las Pruebas SABER 11:</th>
					<th><input type="text" maxlength="30" name="o_codigo_snp" value="" spellcheck="false" placeholder="Codigo SNP"></th>
				</tr>
				<tr>
					<th>Fecha de Presentación de Examen:</th>
					<th><input type="date" id="etx_fech_pre_examen" name="o_presentacion_examen" value="" spellcheck="false" placeholder="dd/mm/aaaa"></th>
				</tr>
				<tr>
					<th>Puntaje de las Pruebas SABER 11:</th>
					<th><input type="number" min="0" max="999" maxlength="3" name="o_puntaje_saber_11" value="" spellcheck="false" placeholder="Puntaje_Saber_11"></th>
				</tr>
				<tr>
					<th>Tiempo Ingreso Universidad: *</th>
					<th><select type="text" name="o_tiem_ingr_uni" size="1">
							<option selected>SELECCIONE</option>
								<?php
									$consulta = oci_parse($conn, "SELECT tiempo_ingreso_nombre,TIEMPO_INGRESO_ID FROM tiempo_ingreso_u order by tiempo_ingreso_nombre asc");
									oci_execute($consulta);
									while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
										{
											echo "<option value='".$row['TIEMPO_INGRESO_ID']."'>".$row['TIEMPO_INGRESO_NOMBRE']."</option>";
										}
								?>
						</select>
					</th>
				</tr>
				<tr><th>Campos con * son obligatorios</th></tr>
				<tr>
					<th><input type="submit" name="botton_accion" value="registrar"></th>
					<th><input type="submit" name="botton_accion" value="modificar"></th>
				</tr>
				<tr><th colspan="2"><input type="submit" name="botton_accion" value="informe 0"></th></tr>
			</table>
		</form>
	</body>
</html>
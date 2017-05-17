<?php
	//variables del formulario info_academica.php
	/*
	ya se puede realizar la insecion de los datos, como la modificacion de los mismo, tener encuenta en la cadena de conexion que este correcta con la de la base de datos en mi caso es "localhost/orcl" la de la profe es "localhost/XE". tambien ter en cuenta que solo se puede ingresar informacion de personas que esten registradas en la tabla estudiantes.
	 */
echo "<H1>DATOS RECOLECTADOS </H1>";
	$nombre_sede         = $_POST['Nomb_sede'];
	$tipo_documento      = $_POST['tipo_documento'];
	$n_doc_iden          = $_POST['n_doc_iden'];
	$f_exp_docm          = $_POST['f_exp_docm'];
	$primer_nombre       =$_POST['Primer_nombre'];
	$segundo_nombre      =$_POST['Segundo_nombre'];
	$primer_apellido       =$_POST['Primer_apellido'];
	$segundo_apellido    =$_POST['Segundo_apellido'];
	$i_nombre_colegio    =$_POST["i_nombre_colegio"];
	$jornada_estudio     =$_POST["Jornada_Estudio"];
	$calendario          =$_POST["calendario"];
	$tipo_colegio        =$_POST["tipo_colegio"];				//no seria mejor colocar una característica al colegio de tipo privado o publico
	$especialidad        =$_POST["especialidad"];
	$metodologia         =$_POST["metodologia"];
	$idioma              =$_POST["idioma"];
	$valor_pension       =$_POST["Valor_pension"];
	$bachillerato_valido =$_POST["bachillerato_valido"];
	$codigo_snp          =$_POST["Codigo_snp"];
	$presentacion_examen =$_POST["presentacion_examen"];
	$puntaje_saber_11    =$_POST["puntaje_saber_11"];
	$tiem_ingr_uni       =$_POST["tiem_ingr_uni"];
	echo "NOMBRE SEDE:".$nombre_sede."<BR>TIPO DE DOCUMENTO:".$tipo_documento."<BR>NUM. DOCUMENTO: ".$n_doc_iden."<BR>FECHA EXPEDICION DOCUMENTO: ".$f_exp_docm."<BR>PRIMER NOM: ".$primer_nombre."<BR> SEGUNDO NOM: ".$segundo_nombre."<BR>PRIMER APE: ".$primer_apellido."<BR>SEGUNDO APE: ".$segundo_apellido."<BR>NOMBRE COLEGIO: ".$i_nombre_colegio."<BR>JORNADA: ".$jornada_estudio."<BR>CALENDARIO: ".$calendario."<BR>TIPO DE COLEGIO: ".$tipo_colegio."<BR>ESPECIALIDAD: ".$especialidad."<BR>METODOLOGIA: ".$metodologia."<BR>IDIOMAS: ".$idioma."<BR>VALOR PENSION: ".$valor_pension."<BR>BACHILLERATO VALIDO: ".$bachillerato_valido."<BR>CODIGIGO PRUEVAS SABER PRO 11: ".$codigo_snp."<BR>FECHA PRESENTACION EXAMEN: ".$presentacion_examen."<BR>PUNTAJE SABER 11: ".$puntaje_saber_11."<BR>TIEMPO INGRESO UNI: ".$tiem_ingr_uni;
	//conexion a la base de datos ORACLE tenga en cuenta la base de datos a la que se conecta que puede ser "orcl" o "xe"
	$conn = oci_connect('satuser','satuser','localhost/orcl');
	if (!$conn) 
	{
	    	$e = oci_error();
		    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
echo "<H1>CONVERCION DE DATOS PRINCIPALES A CODIGO O ID </H1>";
//código de sede a partir de el nombre de la sede
	$consulta = oci_parse($conn, "SELECT codigo_sede FROM sedes where '".$nombre_sede."' = nombre_sede");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$codigo_sede=implode($row);
			echo $codigo_sede;
		}
echo "<br> <br>";
//codigo de docuemento de identidad a partir del nombre del documento
	$consulta = oci_parse($conn, "SELECT TD_CODE FROM tipo_documento where '".$tipo_documento."' = TD_DESCRIPCION");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$codigo_td=implode($row);
			echo $codigo_td;
		}
echo "<br> <br>";
//código del colegio a partir de nombre colegio
	$consulta = oci_parse($conn, "SELECT colegio_code FROM colegios where '".$i_nombre_colegio."' = colegio_descr");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$codigo_colegio=implode($row);
			echo $codigo_colegio;
		}
echo "<br> <br>";
//id de jornada a partir del nombre de la jornada
	$consulta = oci_parse($conn, "SELECT jornada_id FROM jornada where '".$jornada_estudio."' = jornada_nombre");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$jornada_id=implode($row);
			echo $jornada_id;
		}
	echo "<br> <br>";
//id de calendario a partir del nombre del calendario
	$consulta = oci_parse($conn, "SELECT calendario_id FROM calendario where '".$calendario."' = calendario_nombre");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$calendario_id=implode($row);
			echo $calendario_id;
		}
	echo "<br> <br>";
//código de la especialidad a partir del nombre de la especialidad
	$consulta = oci_parse($conn, "SELECT especialidad_code FROM especialidad_colegio where '".$especialidad."' = especialidad_nombre");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$codigo_especialidad=implode($row);
			echo $codigo_especialidad;
		}
	echo "<br> <br>";
//id de metodología a partir de el nombre de la metodología
	$consulta = oci_parse($conn, "SELECT mebac_id FROM metodologia_bachillerato where '".$metodologia."' = mebac_nombre");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$metodologia_id=implode($row);
			echo $metodologia_id;
		}
	echo "<br> <br>";
//id de idioma bachillerato a partir del nombre del idioma del bachillerato
	$consulta = oci_parse($conn, "SELECT idioma_id FROM idioma_bach where '".$idioma."' = idioma_nombre");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$idioma_id=implode($row);
			echo $idioma_id;
		}
	echo "<br> <br>";
//id de tiempo de ingreso a la universidad a partir del tiempo de ingreso nombre
	$consulta = oci_parse($conn, "SELECT tiempo_ingreso_id FROM tiempo_ingreso_u where '".$tiem_ingr_uni."' = tiempo_ingreso_nombre");
	oci_execute($consulta);
	while ($row = oci_fetch_array($consulta, OCI_ASSOC+OCI_RETURN_NULLS)) 
		{
			$tiempo_ingreso_id=implode($row);
			echo $tiempo_ingreso_id;
		}
	echo "<br> <br>";
//
	switch($_POST['botton_accion']) 
	{
		case "registrar":
			$insercion = "INSERT INTO INFO_BACHILLERATO (INFO_BACHILLERATO_ID,ESTUDIANTE_COD_SEDE,ESTUDIANTE_TIPO_DOC,ESTUDIANTE_NUM_DOCUMENTO,COLEGIO_CODE,JORNADA_ID,CALENDARIO_ID,TIPO_COLEGIO,ESPECIALIDAD_COL_CODE,MEBAC_ID,IDIOMA_BACH_ID,VALOR_PENSION,VALIDO_BACH,CODIGO_SABER11,FECHA_SABER11,PUNTAJE_TOTAL_SABER11,TIEMPO_INGRESO_ID) VALUES (id_bachillerato.NextVal,'".$codigo_sede."','".$codigo_td."','".$n_doc_iden."','".$codigo_colegio."','".$jornada_id."','".$calendario_id."','".$tipo_colegio."','".$codigo_especialidad."','".$metodologia_id."','".$idioma_id."','".$valor_pension."','".$bachillerato_valido."','".$codigo_snp."',to_date('".$presentacion_examen."','RRRR/MM/DD'),'".$puntaje_saber_11."','".$tiempo_ingreso_id."')";
			echo "<h1>Consulta</h1>".$insercion;
			$stid = oci_parse($conn,$insercion);
			oci_execute($stid);
		break;
		case "modificar":
			$update = "UPDATE INFO_BACHILLERATO SET ESTUDIANTE_COD_SEDE='".$codigo_sede."',ESTUDIANTE_TIPO_DOC='".$codigo_td."',ESTUDIANTE_NUM_DOCUMENTO='".$n_doc_iden."',COLEGIO_CODE='".$codigo_colegio."',JORNADA_ID='".$jornada_id."',CALENDARIO_ID='".$calendario_id."',TIPO_COLEGIO='".$tipo_colegio."',ESPECIALIDAD_COL_CODE='".$codigo_especialidad."',MEBAC_ID='".$metodologia_id."',IDIOMA_BACH_ID='".$idioma_id."',VALOR_PENSION='".$valor_pension."',VALIDO_BACH='".$bachillerato_valido."',CODIGO_SABER11='".$codigo_snp."',FECHA_SABER11= to_date('".$presentacion_examen."','RRRR/MM/DD'),PUNTAJE_TOTAL_SABER11='".$puntaje_saber_11."',TIEMPO_INGRESO_ID='".$tiempo_ingreso_id."' WHERE ESTUDIANTE_NUM_DOCUMENTO='".$n_doc_iden."'";
				echo "<h1>Actualizacion:</h1>".$update;
				$stid = oci_parse($conn,$update);
				oci_execute($stid);
		break;
	}
/*


//validacion e ingreso de datos		

//carga de datos

/*

*/
/*creacion incremento en oracle
		CREATE SEQUENCE id_bachillerato
		INCREMENT BY 1
		START WITH 0
		MAXVALUE 9999 MINVALUE 0 CYCLE ORDER;
*/
/*creacion tabla tipo documentos 
		CREATE TABLE TIPO_DOCUMENTO
		(
		TD_CODE        VARCHAR2 (2) NOT NULL ,
		TD_DESCRIPCION VARCHAR2 (50)
		) ;
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Página sin título</title>
<meta name="generator" content="WYSIWYG Web Builder 12 - http://www.wysiwygwebbuilder.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/SAT_Icfes_Academico.css" rel="stylesheet">
<link href="css/ingresar_datos_manualmente.css" rel="stylesheet">
<link href="materialicons/material-icons.css" rel="stylesheet">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
function ValidateLayer1(theForm)
{
   var regexp;
   if (theForm.box_esca_mat_saber.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_esca_mat_saber.focus();
      return false;
   }
   if (theForm.box_esca_lect_saber.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_esca_lect_saber.focus();
      return false;
   }
   if (theForm.box_esc_ingle_saber.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_esc_ingle_saber.focus();
      return false;
   }
   if (theForm.box_niv_apr_sbar.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_niv_apr_sbar.focus();
      return false;
   }
   if (theForm.box_esc_infor_saber.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_esc_infor_saber.focus();
      return false;
   }
   if (theForm.box_mate_unisa.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_mate_unisa.focus();
      return false;
   }
   if (theForm.etx_compre_unisa.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.etx_compre_unisa.focus();
      return false;
   }
   if (theForm.box_ingl_unis.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_ingl_unis.focus();
      return false;
   }
   if (theForm.box_niv_unisa.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_niv_unisa.focus();
      return false;
   }
   if (theForm.box_infor_unisa.selectedIndex < 0)
   {
      alert("Please select one of the \"box_Escala\" options.");
      theForm.box_infor_unisa.focus();
      return false;
   }
   return true;
}
</script>
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
<input type="submit" id="Button1" name="Cerrar_sesion" value="Cerrar Sesión">
<hr id="Line11">
</div>
</form>
</div>
<div id="wb_LayoutGrid2">
<div id="LayoutGrid2">
<div class="col-1">
<hr id="Line9">
<div id="wb_FontAwesomeIcon5">
<div id="FontAwesomeIcon5"><i class="fa fa-users">&nbsp;</i></div>
</div>
<div id="wb_Text6">
<span style="color:#000000;">Gestión de Usuarios</span>
</div>
</div>
<div class="col-2">
<hr id="Line8">
<div id="wb_FontAwesomeIcon4">
<div id="FontAwesomeIcon4"><i class="fa fa-upload">&nbsp;</i></div>
</div>
<div id="wb_Text2">
<span style="color:#000000;">Cargar Datos</span>
</div>
</div>
<div class="col-3">
<hr id="Line7">
<div id="wb_FontAwesomeIcon3">
<div id="FontAwesomeIcon3"><i class="fa fa-keyboard-o">&nbsp;</i></div>
</div>
<div id="wb_Text3">
<span style="color:#000000;">Ingresar Datos</span>
</div>
</div>
<div class="col-4">
<hr id="Line5">
<div id="wb_FontAwesomeIcon2">
<div id="FontAwesomeIcon2"><i class="fa fa-smile-o">&nbsp;</i></div>
</div>
<div id="wb_Text4">
<span style="color:#000000;">Registrar Monitorias</span>
</div>
</div>
<div class="col-5">
<hr id="Line6">
<div id="wb_FontAwesomeIcon1">
<div id="FontAwesomeIcon1"><i class="fa fa-exclamation-triangle">&nbsp;</i></div>
</div>
<div id="wb_Text5">
<span style="color:#000000;">Matriz de Riesgos</span>
</div>
</div>
<div class="col-6">
<div id="wb_FontAwesomeIcon6">
<div id="FontAwesomeIcon6"><i class="fa fa-line-chart">&nbsp;</i></div>
</div>
<div id="wb_Text1">
<span style="color:#000000;">Generar Reportes</span>
</div>
</div>
<div class="col-7">
<div id="wb_FontAwesomeIcon7">
<div id="FontAwesomeIcon7"><i class="fa fa-sign-out">&nbsp;</i></div>
</div>
<div id="wb_Text7">
<span style="color:#000000;">Salir</span>
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
<div id="Layer1">
<div id="wb_LayoutGrid5">
<div id="LayoutGrid5">
<div class="col-1">
<div id="wb_tx_Nombre_sede">
<span style="color:#000000;">Nombre de la Sede: </span>
</div>
<select name="Nomb_sede" size="1" id="box_Sede">
<option selected value="sg">San Gil</option>
<option value="y">Yopal</option>
<option value="ch">Chiquínquira</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid4">
<form name="form_identificacion" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="LayoutGrid4">
<div class="col-1">
<div id="wb_Text8">
<span style="color:#000000;">Tipo Documento de Identificación:</span>
</div>
<select name="Tipo_documento" size="1" id="box_tipo_doc">
<option selected value="cc">Cedula Ciudadania</option>
<option value="TI">Tarjeta Identidad</option>
<option value="ID">ID</option>
</select>
<div id="wb_Text9">
<span style="color:#000000;">Número Documento de Identificación:</span>
</div>
<input type="text" id="etx_num_doc" name="Editbox1" value="" spellcheck="false" placeholder="N&#250;mero de Documento">
<div id="wb_Text10">
<span style="color:#000000;">Fecha de expedición Documento:</span>
</div>
<input type="date" id="etx_fec_exp_doc" name="Editbox2" value="" spellcheck="false" placeholder="dd/mm/aaaa">
</div>
<div class="col-2">
<div id="wb_Text11">
<span style="color:#000000;">Primer Nombre:</span>
</div>
<input type="text" id="etx_pri_nombre" name="Primer_nombre" value="" spellcheck="false" placeholder="Primer Nombre">
<div id="wb_Text12">
<span style="color:#000000;">Segundo Nombre:</span>
</div>
<input type="text" id="etx_seg_nombre" name="Segundo_nombre" value="" spellcheck="false" placeholder="Segundo Nombre">
<div id="wb_Text13">
<span style="color:#000000;">Primer Apellido:</span>
</div>
<input type="text" id="etx_pri_apellido" name="Primer_apellido" value="" spellcheck="false" placeholder="Primer Apellido">
<div id="wb_Text14">
<span style="color:#000000;">Segundo Apellido:</span>
</div>
<input type="text" id="etx_seg_apellido" name="Segundo_apellido" value="" spellcheck="false" placeholder="Segundo Apellido">
</div>
</form>
</div>
<div id="wb_LayoutGrid6">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<div id="wb_tx_res_Saber">
<span style="color:#000000;"><strong>Resultados Pruebas SABER 11</strong></span>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid7">
<div id="LayoutGrid7">
<div class="col-1">
<div id="wb_tx_Matematicas">
<span style="color:#000000;"><strong>Matemáticas:</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text16">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_pun_mat_saber" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text17">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_esca_mat_saber">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid8">
<div id="LayoutGrid8">
<div class="col-1">
<div id="wb_tx_lectura">
<span style="color:#000000;"><strong>Lectura Crítica:</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text20">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_pun_lect_saber" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text19">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_esca_lect_saber">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid9">
<div id="LayoutGrid9">
<div class="col-1">
<div id="wb_tx_ingles">
<span style="color:#000000;"><strong>Inglés:</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text23">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_pun_ingl_saber" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text22">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_esc_ingle_saber">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
<div class="col-4">
<div id="wb_Text24">
<span style="color:#000000;">Nivel Aprobado:</span>
</div>
<select name="box_Escala" size="1" id="box_niv_apr_sbar">
<option selected>A1</option>
<option>A2</option>
<option>B1+</option>
<option>B2</option>
<option>C1</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid10">
<div id="LayoutGrid10">
<div class="col-1">
<div id="wb_tex_informatica">
<span style="color:#000000;"><strong>Informática</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text27">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_punt_infor_saber" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text26">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_esc_infor_saber">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid11">
<div id="LayoutGrid11">
<div class="col-1">
<div id="wb_tx_resul_cono_unisangil">
<span style="color:#000000;"><strong>Resultados Pruebas Conocimiento UNISANGIL</strong></span>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid12">
<div id="LayoutGrid12">
<div class="col-1">
<div id="wb_tx_matematicas">
<span style="color:#000000;"><strong>Matemáticas:</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text31">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_mate_unisa" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text30">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_mate_unisa">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid13">
<div id="LayoutGrid13">
<div class="col-1">
<div id="wb_tx_comprension">
<span style="color:#000000;"><strong>Comprensión Lectora:</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text34">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_compren_unisa" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text33">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="etx_compre_unisa">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid14">
<div id="LayoutGrid14">
<div class="col-1">
<div id="wb_tx_inglesU">
<span style="color:#000000;"><strong>Inglés:</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text37">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_ingl_unisa" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text36">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_ingl_unis">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
<div class="col-4">
<div id="wb_Text38">
<span style="color:#000000;">Nivel Aprobado:</span>
</div>
<select name="box_Escala" size="1" id="box_niv_unisa">
<option selected>A1</option>
<option>A2</option>
<option>B1+</option>
<option>B2</option>
<option>C1</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid15">
<div id="LayoutGrid15">
<div class="col-1">
<div id="wb_tx_inforU">
<span style="color:#000000;"><strong>Informática</strong></span>
</div>
</div>
<div class="col-2">
<div id="wb_Text41">
<span style="color:#000000;">Puntaje:</span>
</div>
<input type="text" id="etx_info_unisa" name="Editbox1" value="" spellcheck="false" placeholder="Puntaje">
</div>
<div class="col-3">
<div id="wb_Text40">
<span style="color:#000000;">Escala:</span>
</div>
<select name="box_Escala" size="1" id="box_infor_unisa">
<option selected>1</option>
<option>2</option>
<option>3</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid16">
<div id="LayoutGrid16">
<div class="col-1">
<div id="wb_tx_observa">
<span style="color:#000000;"><strong>Observaciones Director de Programa</strong></span>
</div>
</div>
<div class="col-2">
<textarea name="TextArea1" id="txa_observacions" rows="5" cols="50" spellcheck="true"></textarea>
</div>
</div>
</div>
<div id="wb_LayoutGrid17">
<div id="LayoutGrid17">
<div class="col-1">
<input type="submit" id="bt_res_pruebas_aspirantes" name="Res. Pruebas Aspirantes" value="Res. Pruebas Aspirantes">
</div>
<div class="col-2">
<input type="submit" id="bt_generar_alerta" name="Generar Alerta 0" value="Generar Alerta 0">
</div>
</div>
</div>
<div id="wb_LayoutGrid21">
<div id="LayoutGrid21">
<div class="col-1">
<input type="submit" id="bt_Registrar" name="Registrar" value="Registrar">
</div>
<div class="col-2">
<input type="submit" id="bt_Modificar" name="Modificar" value="Modificar">
</div>
<div class="col-3">
<input type="submit" id="bt_Volver" name="Volver" value="Volver">
</div>
</div>
</div>
</div>
</body>
</html>
<html>
<head>
<title>Exibe Mensagem</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000FFF" link="#333399" vlink="#CC0000" 
alink="#663399">

<?php
$ok=$_GET['ok'];
$tipo_msg=$_GET['tipo_msg'];
echo ("<p><center><img src=\"topo.gif\" width=\"640\" height=\"44\"></center></p>");
if ($tipo_msg == "I") {
 //se inclusão OK
 if ($ok == 1) {
	  ?>
		<BR><BR><center><b><font size = 4> Inclusão Efetuada </font></b></center>
		<BR>
	 <center><b> <a href="inclusao.html">Voltar</a> </b></center>
	 <?php
 } //fim do if ok1
 // se deu erro na inclusão
 if ($ok == 2) {
	  ?>
	  <BR><BR><center><b><font size = 4> Inclusão Não Efetuada </font></b></center>
		<BR>
	 <center><b> <a href="inclusao.html">Voltar</a> </b></center>
	 <?php
 } //fim do if ok2
}//fim do if tipo_msg

if ($tipo_msg == 'E') {
 //se exclusão OK
 if ($ok == 1) {
	 ?>
	<BR><BR><center><b><font size = 4> Exclusão Efetuada </font></b></center>
	<BR>
	<center><b> <a href="exclusao.html">Voltar</a> </b></center>
 <?php
 }//fim do if do ok1
 // se deu erro na exclusão
 if ($ok == 2) {
	 ?>
	<BR><BR><center><b><font size = 4> Exclusão Efetuada </font></b></center>
	<BR>
	<center><b> <a href="exclusao.html">Voltar</a> </b></center>
	<?php
 }
 // se funcionário não cadastrado
 if ($ok == 3) {
	 ?>
 <BR><BR>
 <center><b> Funcionário não cadastrado </b></center>
 <BR><BR>
 <center><b> <a href=\"exclusao.html\">Voltar</a> </b></center>
 <?php
 }
}

?>
</body>
</html>
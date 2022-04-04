<?php
include ("funcoes.php");
// Recebe variáveis globais do formulário
$nome=$_POST['nome'];
// Tirar espaço em branco das variáveis recebidas do formulário
$nome = trim($nome);
// Consiste Nome 
if (empty($nome)) {
	 $html = file("alteracao.html");
	 $html = implode(" ",$html);
	 $erro = "<center><font color=\"#FF0000\"> Preencha o campo 
	<b>Nome</b></font></center>";
	 $html = str_replace("<!mensagem>",$erro,$html);
	 echo ($html);
}
else {
	 // Cria uma conexão com o servidor MySQL
	 // Parâmetros: host, username, senha
	 $conec = mysqli_connect ("localhost","root","","phstutors");
	 // Declaração do SQL
	 $declar = "SELECT `nome`,`cpf`,`telefone`, `endereco`, `email` from clientes where nome = '$nome'";
	 // Roda a query e verifica se encontrou registro
	 $query = mysqli_query($conec, $declar) or die ("Erro no acesso ao banco");
	 $achou = mysqli_num_rows($query);
	 // echo ($achou);
	 // Se encontrou, guarda as variáveis
	 if ($achou > 0) {
		 $row = mysqli_fetch_row ($query);
		 $nome = $row[0];
		 $cpf = $row[1];
		 $telefone = $row[2];
		 $endereco = $row[3];
		 $email = $row[4];
		 $script_chamador = 'A';
		 
		monta_pagina($nome,$cpf,$telefone,$endereco,$email,$script_chamador);
	 }
 else {
 echo ('
 <html><head>
 <title>Inclusao.php</title>
 <meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1">
 </head>
 <body bgcolor="#FFFFFF" text="#000000" link="#333399"
vlink="#CC0000" alink="#663399">
 ');
 echo ("<p><center><img src=\"topo.gif\" width=\"640\"
height=\"44\"></center></p>");
 echo ("<BR><BR>");
 echo ("<center> <b> Funcionário não cadastrado </b> </center>");
 echo ("<BR>");
 echo ("<center> <b> <a href=\"alteracao.html\">Voltar</a> </b>
</center>");
 }
}
?>
</body>
</html>

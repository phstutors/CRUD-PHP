<?php
function monta_pagina($nome,$cpf,$telefone,$endereco,$email,$script_chamador)
{

		// Recebe variaveis globais global 

		/*
		as variaveis globais entra em conflito com o escopo das variaveis da function, por isso o xampp retorna um erro de undefined
		$nome=$_POST['nome'];
		$telefone=$_POST['telefone']; 
		$endereco=$_POST['endereco'];
		$email=$_POST['email'];
		$script_chamador;
		*/
		// Tirar espaco em branco das variaveis recebidas atraves do formulario
		$nome = trim($nome);
		$cpf = trim($cpf);
		$telefone = trim($telefone);
		$endereco = trim($endereco);
		$email = trim($email);
		$script_chamador=trim($script_chamador);

		echo ('
		<html>
		<head>
		<title>inclusao.php</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		</head>
		<body bgcolor="#FFFFFF " text="#OOOOOO " link="#333399" vlink ="#CCOOOO " alink="#663399">');



		echo ("<p><center><img src=\"topo.gif\" width=\"640\" height=\" 44\"></center></p> ");

		if ($script_chamador == 'A2') {
			echo ("<font color=\"#FFOOOO\"><b>Campo(s) obrigat6rio(s) nao preenchido(s)</b></font>");
		}
		echo "<table width=\"640\" border=\"0\" cellspacing=\"0\" align=\"center\">";
		echo "<tr>"; 
		echo "<td>";
		echo "<p><b>Formulario de alteracao: <br></b></p>" ;
		echo "<form method=\"post\"action=\"alteracao2.php\">"; 
		echo "<p>Nome : $nome </p> ";
		echo "<p>CPF: <input type=\"text\"name=\"telefone\"value=\"$cpf\"size=\"40\"maxlength=\"40\"> </p>";
		echo "<p>telefone: <input type=\"text\"name=\"telefone\"value=\"$telefone\"size=\"40\"maxlength=\"40\"> </p>";
		echo "<p>endereco: <input type=\"text\"name=\"endereco\"value=\"$endereco\"maxlength=\"10\"size=\"10\"> </p> ";
		echo "<p>E-mail:<input type=\"text\"name=\"email\"value=\"$email\"size=\"25\"maxlength=\"25\"> </p>";
		echo "<p> <input type=\"submit\"name=\"Submit\"value=\"Enviar\">
		</p>";
		echo "<p> <input type=\"hidden\" name=\"nome\" value =\"$nome\"></p>";
		echo "</form>";
		echo "</td>"; echo "</tr>"; echo "<tr>"; echo "</tr>"; echo "</table> ";
		echo ("<center> <b> <a href=\"alteracao.html\">Voltar</a> </b></center>");

	return;
}
?>

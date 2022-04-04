<?php
// Recebe variáveis globais do formulário
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$telefone=$_POST['telefone'];
$endereco=$_POST['endereco'];
$email=$_POST['email'];
// Tirar espaço em branco das variáveis recebidas através do formulário
$nome = trim($nome);
$cpf = trim($cpf);
$telefone = trim($telefone);
$endereco = trim($endereco);
$email = trim($email);

// PhsTutors modificou esse arquivo ajeitando os bugs e etc

// Consiste as variáveis recebidas
if (empty($nome) || empty($telefone) || empty($endereco) || empty($email) || empty($cpf)) {
	 // se campos obrigatórios não preenchidos, 
	 //recria o formulário e exibemensagem de erro
	 ?>
	 <html>
	 <head>
	 <title>Inclusao.php</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	 </head>
	 <body bgcolor="#FFFFFF" text="#000000" link="#333399" vlink="#CC0000"
	alink="#663399">
	 <p><center><img src="topo.gif" width="640" height="44"></center></p>
	 <font color="#FF0000"><b>Campo(s) obrigatório(s) não preenchido(s)</b></font>
	 <table border="0" cellspacing="0" align="center">
	 <tr>
	 <td>
	 <p><b>Formulário de inclusão: <br></b></p>
	 <form method="post" action="inclusao.php">
	 <p>Nome completo:
	 <input type="text" name="nome" value="<?php echo $nome?>" size="25" maxlength="50">
	 </p>
	 <p>Telefone: <input type="text" name="telefone" value="<?php echo $telefone?>" size="40" maxlength="40"> </p>
	 <p>Endereco:
	<input type="text" name="endereco" value="<?php echo $endereco?> " maxlength="10" size="10">
	 </p>
	 <p>Email:
	<input type="text" name="email" value="<?php echo $email?> " maxlength="10" size="40">
	 </p>
	 
	 <p>
	 <input type="submit" name="Submit" value="Enviar">
	 <center> <b> <a href="index.html">Home</a> </b> </center>
	 </p>
	 </form>
	 </td>
	 </tr>
	 <tr>
	 <td>&nbsp;</td>
	 </tr>
	 </table>
 <?php
}
else {
	 // Inclui os dados na tabela funcionarios
	 // Cria uma conexão com o servidor MySQL passando host, username e senha
	 $conec = mysqli_connect ("localhost","root","","phstutors") or die ("Falha na conexão com o banco de dados");
	 // Declaração SQL
$declar = "INSERT INTO `clientes`(`nome`,`cpf`, `telefone`, `endereco`,`email`) VALUES ('$nome','$cpf','$telefone','$endereco', '$email')";
	 //echo ($declar);
	 // Roda a query e trata o resultado
	 $tipo_msg = 'I';
	 if (mysqli_query($conec, $declar)) {
		$ok=1;
		header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
	 }
	 else {
		$ok=2;
		header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
		// header("Location:exibe_mensagem.php?variavel1=$variavel1&variavel2=$variavel2");
	 }
	 // Fecha a conexão com o servidor MySQL (Opcional)
	 mysql_close ($conec);
}
?>
</body>
</html>
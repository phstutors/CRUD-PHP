<html>
<head>
<title>Consulta.php Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#333399" vlink="#CC0000" 
alink="#663399">
<?php
// Recebe variável global do formulário
 $nome = $_POST['nome'];
// Tirar espaço em branco da variável recebida através do formulário
$nome = trim($nome);
// Consiste Nome 
if (empty($nome)) {
 $html = file("consulta.html");
 $html = implode(" ",$html);
 $erro = "<center><font color=\"#FF0000\"> Preencha o campo <b>Nome</b> 
</font></center>";
 $html = str_replace("<!mensagem>",$erro,$html);
 echo ($html);
}
else {
 echo ("<p><center><img src=\"topo.gif\" width=\"640\" 
height=\"44\"></center></p>");
 // Cria uma conexão com o servidor MySQL
 // Parâmetros: host, username, senha
 $conec = mysqli_connect ("localhost","root","","phstutors");
 // Declaração do SQL
 $declar = "SELECT `nome`,`cpf`,`telefone`, `endereco`,`email` FROM `clientes` WHERE `nome`='$nome'";
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
 echo ("<BR>");
 echo ("<table width=\"640\" border=\"0\" cellspacing=\"0\" 
align=\"center\"> <tr> <td>");
 echo ("<b> Resultado da Consulta </b>");
 echo ("<BR><BR>");
 echo ("<b> Nome: </b> $nome <BR>");
 echo ("<b> Cpf: </b> $cpf <BR>");
 echo ("<b> Telefone: </b> $telefone <BR>");
 echo ("<b> Endereco: </b> $endereco <BR>");
 echo ("<b> Email: </b> $email <BR>");
 echo ("</td> </tr> </table>");
 echo ("<center> <b> <a href=\"consulta.html\">Voltar</a> </b> 
</center>");
 }
 else {
 echo ("<BR>");
 echo ("<center> <b> Funcionário não cadastrado </b> </center>");
 echo ("<BR>");
 echo ("<center> <b> <a href=\"consulta.html\">Voltar</a> </b> 
</center>");
 }
}
?>
</body>
</html>
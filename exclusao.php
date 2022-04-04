
<?php
// Recebe variáveis globais do formulário
$nome = $_GET['nome'];
// Tirar espaço em branco das variáveis recebidas do formulário
$nome = trim($nome);
// Consiste Nome
if (empty($nome)) {
 $html = file("exclusao.html");
 $html = implode(" ",$html);
 $erro = "<center><font color=\"#FF0000\"> Preencha o campo 
<b>Nome</b></font></center>";
 $html = str_replace("<!mensagem>",$erro,$html);
 echo ($html);
}
else {
 // Cria uma conexão com o servidor MySQL
 $conec = mysqli_connect ("localhost","root","","phstutors");
 // Declaração do SQL
 $declar = "SELECT `nome` from `clientes` where `nome` = '$nome'";
 // Roda a query, verifica se funcionário é cadastrado
 $query = mysqli_query($conec, $declar) or die ("Erro no acesso ao banco");
 $achou = mysqli_num_rows($query);
 //echo ($achou);
 // Se encontrou exclui, senão mostra mensagem
 $tipo_msg = 'E';
 if ($achou > 0) {
 // Exclui registro na tabela funcionarios
 $declar2 = "DELETE from `clientes` where `nome` = '$nome'";
 if (mysqli_query($conec, $declar2)) {
 $ok = 1;
 header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
 }
 else {
 $ok = 2;
 header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
 }
    }
else {
 $ok = 3;
 header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
 }
 mysqli_close ($conec);
}
?>
</body>
</html>
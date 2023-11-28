<?php
include_once('controle.php');
require './dompdf/vendor/autoload.php';

$id_questionario = $_GET['id_questionario'];
$sql = "SELECT usuario.nome, responde.quant_acertos, questionario.titulo_quest, questionario.assunto FROM usuario 
INNER JOIN responde ON usuario.id_usuario = responde.id_usuario 
INNER JOIN questionario ON responde.id_questionario = questionario.id_questionario 
WHERE questionario.id_questionario = $id_questionario";
$resultado = mysqli_query($conexao, $sql);
$contador = mysqli_num_rows($resultado);
$info = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$titulo_quest = $info[0]['titulo_quest'];
$assunto_quest = $info[0]['assunto'];

$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-BR'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
$dados .= "<title>Relatório de Acertos</title>";
$dados .= "<style>
h4 { text-align : center;   font-size : 20px;   color : purple; }
img { width:250px; }
table, th, td { border: 1px solid;   padding: 2px; }
table { width: 100%;   border-collapse: collapse; }
th { height: 30px;   background-color: #caa7fa; }
td { text-align: center;   height: 30px; }
</style>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h4>Relatório de Acertos do Questionário: $titulo_quest </h4>";
$dados .= "<hr>";
$dados .= "<div class='container'>";
$dados .= "<table>";
$dados .= "<thead>";
$dados .= "<tr>";
$dados .= "<th> Nome do Aluno </th>";
$dados .= "<th> Número de Acertos </th>";
$dados .= "</tr>";
$dados .= "</thead>"; 
$dados .= "<tbody>";
foreach ($info as $aluno){
    $dados .= "<tr>";
    $dados .= "<td>" . $aluno['nome'] . "</td>";
    $dados .= "<td>" . $aluno['quant_acertos'] . "</td>";
    $dados .= "</tr>";
}
$dados .= "</tbody>";
$dados .= "</table>";
$dados .= "<br>";
$dados .= "</body>"; 
$dados .= "</html>"; 

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('chroot', realpath(''));
$dompdf = new Dompdf($options);
$dompdf-> loadHtml($dados);
$dompdf->set_option('defaultFont', 'Times New Roman');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Relatório_Respostas');
?>

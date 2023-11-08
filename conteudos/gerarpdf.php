<?php 
require '../dompdf/vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
require 'introducao.php';
$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream("conteudo.pdf", ['Attachment'=>false]);
?>
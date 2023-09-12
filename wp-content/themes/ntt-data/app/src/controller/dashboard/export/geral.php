<?php
require_once(dirname(__FILE__, 4) . '/config/config.php');


header("Content-type:application/x-msexcel; charset=UTF-8");
header("Content-Disposition: attachment; filename=filegeral.xls");


$dataCountries = unserialize($_SESSION['dataCountries']);

$generalData = unserialize($_SESSION['generalData']);
$generalPoints = $generalData['points'];
$generalGuest = $generalData['guest'];
$generalRegister = $generalData['register'];
$generalComment = $generalData['comment'];
$generalPub = $generalData['pub'];

$html = <<<HTML
<h1>Geral</h1>
    <table>
        <tr>
            <th>Cadastros</th>
            <td>$generalRegister</td>
        </tr>
        <tr>
            <th>Convidados</th>
            <td>$generalGuest</td>
        </tr>
        <tr>
            <th>Pontos</th>
            <td>$generalPoints</td>
        </tr>
        <tr>
            <th>Publicações</th>
            <td>$generalPub</td>
        </tr>
        <tr>
            <th>Comentários</th>
            <td>$generalComment</td>
        </tr>
    </table>
HTML;

echo $html;
<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

$conn = new PDO('mysql:host=localhost;dbname=cours', 'root', '');
$sql = 'SELECT * FROM cours';
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$gt = 0;
$i = 1;
$html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">
    <style>
    body {
        font-family: sans-serif;
    }
    
    h1 {
        color: #333;
    }
    
    p {
        margin-bottom: 20px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    
    table, th, td {
        border: 1px solid #ddd;
    }
    
    th, td {
        padding: 12px;
        text-align: left;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    .footer {
        text-align: center;
        font-style: italic;
        margin-top: 20px;
        color: #777;
    }
    
   
    
    /* Add more styles as needed */
    
    </style>
</head>
<body>




    <h1> List of courses </h1>

    <p>Activitar</p>

    <table>
        <thead>
            <tr>
                <th class="red-text">Id Course</th>
                <th>Name</th>
                <th>Description</th>
              
                <th>niveau</th>
            </tr>
        </thead>
        <tbody>';

foreach ($rows as $cour) {
    $html .= '<tr>
            <td >' . $cour['id'] . '</td>
           <td >' . $cour['nom'] . '</td>
           <td >' . $cour['description'] . '</td>
            <td >' . $cour['niveau'] . '</td>
            </tr>';
}

$html .= ' </tbody>
        </table>

        <footer>
           
        </footer>

    </body>
    </html>';

    $dompdf = new Dompdf;
    $dompdf->loadHtml($html);
    $options = $dompdf->getOptions();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('invoice.pdf', ["Attachment" => 0]);
    $output = $dompdf->output();
    file_put_contents("file.pdf", $output);
?>

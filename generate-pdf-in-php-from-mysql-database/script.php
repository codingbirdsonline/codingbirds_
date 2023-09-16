<?php

require __DIR__ . '/vendor/autoload.php';
require_once "Database.php";
$db = new Database();

try {
    $html = getData($db);
    $fileName = "users.pdf";
    $mpdf = new \Mpdf\Mpdf();
    $styleSheet = file_get_contents('style.css');
    $mpdf->WriteHTML($styleSheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html);
    $mpdf->Output($fileName, 'D');
    $mpdf->Output("document/$fileName", 'F');
}catch(Exception $e){
    echo "Oops! Something went wrong";
}



function getData($db){
    $html = '<table>
            <tr>
                <td>Sr.No</td>
                <td>Name</td>
                <td>Email</td>
                <td>Contact</td>
            </tr>';
    $sr = 1;
    $users = $db->connection->query("SELECT * FROM bird_stripe_payments");
    while ($row = $users->fetch_object()){
        $html .= '<tr>
                    <td>'.$sr.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->email.'</td>
                    <td>'.$row->contact.'</td>
                </tr>';

        $sr++;
    }
    $html .= '</table>';
    return $html;
}

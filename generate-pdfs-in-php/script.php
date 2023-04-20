<?php
require("vendor/autoload.php");

try {
    $html = getPdfContent();
    $filename = "invoice.pdf";
    $stylesheet = file_get_contents('style.css');
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html);
    ob_clean();
    $mpdf->Output($filename, "D"); // This downloads the file
    $mpdf->Output("docs/$filename", "F"); // This saves the file to folder
} catch (\Mpdf\MpdfException $e) {
    echo "Something went wrong: ". $e->getMessage();
}
/**
 * This function prepares the PDF content
 * @return html|string
 */
function getPdfContent(){
    /**
     * Here this $student is just an static data
     * Create your own business logic like get the data from db, modify, loop...etc
     */
    $students = array(
        array(
          "name" => "Ankit",
          "email" => "ankit@ankit.com",
          "contact" => "xxxxxxx85555",
          "country" => "India",
        ),
        array(
            "name" => "Parth",
            "email" => "parth@gmail.com",
            "contact" => "xxxxxxx88855",
            "country" => "India",
        ),
        array(
            "name" => "Rohit",
            "email" => "rohit@gmail.com",
            "contact" => "xxxxxxx85525",
            "country" => "India",
        ),
        array(
            "name" => "Allex",
            "email" => "allex@gmail.com",
            "contact" => "xxxxxxx85555",
            "country" => "India",
        )
    );
    $table = '<table>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>contact</th>
                <th>Country</th>
              </tr>';
    foreach ($students as $key => $student){
        $table .= '
              <tr>
                <td>'.($key+1).'</td>
                <td>'.$student['name'].'</td>
                <td>'.$student['email'].'</td>
                <td>'.$student['contact'].'</td>
                <td>'.$student['country'].'</td>
              </tr>';
    }
    $table .= '</table>';
    return $table;
}

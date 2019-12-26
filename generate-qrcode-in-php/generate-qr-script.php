<?php
include "library/qrlib.php";

if (isset($_POST['generateQr']) == 'generateQr')
{
    $qrText = $_POST['qrText']; // receive the text for QR
    $directory = "generated-qr/"; // folder where to store QR
    $fileName = 'QR-'.rand().'.png'; // generate random name of QR image
    QRcode::png($qrText, $directory.$fileName, 'L', 4, 2); // library function to generate QR
    echo "success^".$directory.$fileName; // returns the qr-image path

}

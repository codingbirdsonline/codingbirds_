<?php
if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    echo 'Country is: '. $country; echo '<br/>';
    echo 'State is  : '. $state; echo '<br/>';
    echo 'City is   : '. $city; echo '<br/>';
}

<?php
class Common
{
    public function getData($connection) {
        $query = "SELECT * FROM bird_records";
        $result = $connection->query($query);
        return $result;
    }
}

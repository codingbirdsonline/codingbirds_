<?php
class Common
{
    public function getAllRecords($connection) {
        $query = "SELECT * FROM bird_delete_records";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
    public function deleteRecordById($connection,$id) {
        $query = "DELETE FROM bird_delete_records WHERE id='$id'";
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result;
    }
}

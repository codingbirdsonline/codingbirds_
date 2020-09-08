<?php
class Common
{
    /**
     * This function fetches all the records from database
     * @param $connection
     * @return query
     */
    public function getAllRecords($connection)
    {
        $query = "SELECT * FROM bird_records";
        $result = $connection->query($query);
        if ($result){
            return $result;
        }else{
            die("Error in query" .$connection->error);
        }
    }

    /**
     * This function deletes a particular record from table
     * @param $connection
     * @param $id
     * @return query
     */
    public function deleteRecord($connection,$id)
    {
        $query = "DELETE FROM bird_records WHERE id='$id' ";
        $result = $connection->query($query);
        if ($result){
            return $result;
        }else{
            die("Error in delete query" .$connection->error);
        }
    }
}

<?php


class CrudOperations
{
    public function saveData($connection,$name,$email,$contact,$editId)
    {
        if ($editId == "") {
            $query = "INSERT INTO crud_application SET name='$name',email='$email',contact='$contact'";
        }else{
            $query = "UPDATE crud_application SET name='$name',email='$email',contact='$contact' WHERE id='$editId'";
        }
        $result = $connection->query($query) or die("Error in saving data".$connection->error);
        return $result;
    }

    public function getAllData($connection)
    {
        $query = "SELECT * FROM crud_application";
        $result = $connection->query($query) or die("Error in getting data".$connection->error);
        return $result;
    }

    public function deleteData($connection,$deleteId){
        $query = "DELETE FROM crud_application WHERE id='$deleteId'";
        $result = $connection->query($query) or die("Error in deleting data".$connection->error);
        return $result;
    }
}

<?php
/**
 * 
 */
class Common
{
	
    public function getCategories($connection)
	{
		$query = "SELECT * FROM category";
		$result = $connection->query($query);
		return $result;
	}

	 public function saveCategory($connection,$category)
	{
		$query = "INSERT INTO category SET name= '$category' ";
		$result = $connection->query($query);
		return $connection->insert_id;
	}
}
<?php
class Database
{
    protected $connection = null;
    public function __construct()
    {
        try {
            $this->connection = new mysqli("localhost", "root", "", "codingbirds");
            if (!$this->connection) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function query($query = "")
    {
        try {
            $result = $this->connection->query( $query );
            if($result) {
                return $result;
            }
            throw New Exception("Unable to execute query: " . $query);
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
}

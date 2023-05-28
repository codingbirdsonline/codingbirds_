<?php
include_once "../env-constants.php";
class Database
{
    protected $connection = null;

    /**
     * Prepares the DB connection
     * Database constructor.
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$this->connection) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Executes the query
     * @param string $query
     * @return bool|mysqli_result
     * @throws Exception
     */
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

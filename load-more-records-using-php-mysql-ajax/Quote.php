<?php
class Quote
{
    /**
     * Load the quotes based on limit. offset
     * @param $connection
     * @param $pagination
     * @return object
     */
    public function loadQuotes($connection, $pagination)
    {
        $query = "SELECT * FROM bird_quotes LIMIT ". $pagination['offset']. ",". $pagination['limit'];
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result;
    }

    /**
     * Calculates the total quotes in database
     * @param $connection
     * @return int
     */
    public function totalQuotes($connection)
    {
        $query = "SELECT COUNT(*) FROM bird_quotes as quotes_count";
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result->fetch_row()[0];
    }
}

<?php
require_once "constants.php";
require_once "Database.php";
require_once "Quote.php";
/**
 * Prepares the Database, Quote class objects
 */
$db = new Database();
$quote = new Quote();
if (isset($_POST['request_name'])){
    if($_POST['request_name'] == 'load-more-quotes'){
        /**
         * Make the offset, limit
         */
        $offset = ($_POST['page'] - 1) * PER_PAGE;
        $limit = PER_PAGE;
        $quotesData = array();
        $pagination = array(
            'offset' => $offset,
            'limit' => $limit,
        );
        $quotes = $quote->loadQuotes($db->connection, $pagination);
        $totalQuotes = $quote->totalQuotes($db->connection);
        if($quotes){
            while ($quote = $quotes->fetch_object()){
                $quotesData[] = $quote;
            }
        }
        echo json_encode(array(
            'data' => $quotesData,
            'remaining_quotes' => $totalQuotes - PER_PAGE * $_POST['page'],
        ));
    }
}

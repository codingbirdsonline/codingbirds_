<?php
class User
{
    /**
     * Register the user
     * @param $connection
     * @param $data
     * @return mixed
     */
    public function registerUser($connection, $data)
    {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO bird_stripe_payments SET name ='{$data['name']}',email='{$data['email']}',
        contact='{$data['contact']}',amount='{$data['amount']}', created_at='{$date}' ";
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result;
    }

    /**
     * Update the payment status
     * @param $connection
     * @param $txnId
     * @param $userId
     * @return mixed
     */
    public function updatePaymentStatus($connection, $txnId, $userId)
    {
        $query = "UPDATE bird_stripe_payments SET payment_status='Completed', payment_intent='$txnId' WHERE id='$userId' ";
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result;
    }
}

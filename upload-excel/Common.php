<?php
/**
 * Created by PhpStorm.
 * User: kc
 * Date: 11/29/2018
 * Time: 7:50 PM
 */

class Common
{
  public function uploadData($connection,$name,$contact,$email)
  {
      $mainQuery = "INSERT INTO  bird_excel_users SET name='$name',contact='$contact',email='$email'";
      $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
      return $result1;
  }
}

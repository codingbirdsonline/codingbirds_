<?php


class Database
{
    public $connection;
    public function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "codingbirds");
    }
}

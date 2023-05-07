<?php

require_once "Database.php";

class Dropdown extends Database
{
    /**
     * Gets the list of countries
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function getCountries()
    {
        return $this->query("SELECT * FROM bird_countries");
    }

    /**
     * Get the list of states for a country
     * @param $countryId
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function getStates($countryId)
    {
        return $this->query("SELECT * FROM bird_states WHERE countryId=$countryId");
    }

    /**
     * Get the list of cities for a state
     * @param $stateId
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function getCities($stateId)
    {
        return $this->query("SELECT * FROM bird_cities WHERE state_id=$stateId");
    }
}

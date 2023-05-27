<?php
require_once "Dropdown.php";
require_once "Helper.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

/**
 * Validate & check endpoint exists
 * otherwise reject the request
 */
$endpoint = @$_GET['endpoint'];
$helper = new Helper();
if(!$endpoint || !$helper->checkEndpoint($endpoint)){
    $response = array(
        "message" => "Oops! Invalid endpoint!"
    );
    $helper->sendJsonResponse($response, array("HTTP/1.1 404 Not Found"));
    exit;
}

$dropdown = new Dropdown();
/**
 * Endpoint: /index.php?endpoint=getcountry
 * return the countries in json format
 */
if($endpoint == "getcountry"){
    try {
        $countries = $dropdown->getCountries();
        $countriesArr = array();
        while($country = $countries->fetch_object() ){
            $countriesArr[] = array(
                "id" => (int) $country->id,
                "name" => $country->name,
            );
        }
        $helper->sendJsonResponse($countriesArr, array("HTTP/1.1 200 OK"));
    }catch(Exception $e){
        $errorResponse = array("message" => "Something went wrong: ". $e->getMessage());
        $helper->sendJsonResponse($errorResponse, array("HTTP/1.1 500 Internal Server Error"));
    }
}
/**
 * Endpoint: /index.php?endpoint=getstate&country_id={countryId}
 * return the states for a country id in json format
 */
else if($endpoint == "getstate"){
    try {
        $countryId = @$_GET["country_id"];
        if(!$countryId || !is_numeric($countryId)){
            $response = array(
                "message" => "country_id is invalid or required"
            );
            $helper->sendJsonResponse($response, array("HTTP/1.1 422 Unprocessable Entity"));
        }else{
            $statesArr = array();
            $states = $dropdown->getStates($countryId);
            while($state = $states->fetch_object() ){
                $statesArr[] = array(
                    "id" => (int) $state->id,
                    "name" => $state->statename,
                );
            }
            $helper->sendJsonResponse($statesArr, array("HTTP/1.1 200 OK"));
        }
    }catch(Exception $e){
        $errorResponse = array("message" => "Something went wrong: ". $e->getMessage());
        $helper->sendJsonResponse($errorResponse, array("HTTP/1.1 500 Internal Server Error"));
    }
}
/**
 * Endpoint: /index.php?endpoint=getcity&state_id={stateId}
 * return the cities for a state id in json format
 */
else if($endpoint == "getcity"){
    try {
        $stateId = @$_GET["state_id"];
        if(!$stateId){
            $response = array(
                "message" => "state_id required"
            );
            $helper->sendJsonResponse($response, array("HTTP/1.1 422 Unprocessable Entity"));
        }else{
            $cityArr = array();
            $cities = $dropdown->getCities($stateId);
            while($city = $cities->fetch_object() ){
                $cityArr[] = array(
                    "id" => (int) $city->id,
                    "name" => $city->cityName,
                );
            }
            $helper->sendJsonResponse($cityArr, array("HTTP/1.1 200 OK"));
        }
    }catch(Exception $e){
        $errorResponse = array("message" => "Something went wrong: ". $e->getMessage());
        $helper->sendJsonResponse($errorResponse, array("HTTP/1.1 500 Internal Server Error"));
    }
}

<?php


class Helper
{
    /**
     * Validate calling endpoint
     * @param $endpoint
     * @return bool
     */
    function checkEndpoint($endpoint)
    {
        $validEndpoints = array(
            "getcountry",
            "getstate",
            "getcity"
        );
        if(in_array($endpoint, $validEndpoints)){
            return true;
        }
        return false;
    }

    /**
     * Send final api response in json format
     * @param $data
     * @param array $httpHeaders
     */
    function sendJsonResponse($data, $httpHeaders = array())
    {
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
            header("Content-Type: application/json");
        }
        echo json_encode(array(
            "data" => $data
        ));
        exit;
    }
}

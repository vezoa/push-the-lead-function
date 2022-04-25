<?php

/*
|--------------------------------------------------------------------------
| Standalone script to push a new lead to Lead Application
|--------------------------------------------------------------------------
*/

function vzlPushLead($data, $app_base_url = "https://leads.vezoa.com/", $source = null, $activity = null)
{
    try {

        $vzl_route = $app_base_url . "/api/v1/leads";

        $vzl_ch = curl_init();

        $payload = json_encode(
            array(
                "info" => $data,
                "source" => $source,
                "activity" => $activity,
                "server" => $_SERVER,
            )
        );

        curl_setopt($vzl_ch, CURLOPT_URL, $vzl_route);
        curl_setopt($vzl_ch, CURLOPT_POST, 1);
        curl_setopt($vzl_ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($vzl_ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
        curl_setopt($vzl_ch, CURLOPT_RETURNTRANSFER, true);

        $vzl_response = curl_exec($vzl_ch);

        /*
        |--------------------------------------------------------------------------
        |  If you want to save the lead in a log file to have a backup in the server, uncomment the next line
        |--------------------------------------------------------------------------
        */
        
        //file_put_contents("log.txt", $vzl_response . "\n \n", FILE_APPEND);

        curl_close($vzl_ch);

        return $vzl_response;

    } catch (\Throwable $th) {
        file_put_contents("error_log.txt", $th->getMessage() . "\n \n", FILE_APPEND);
    }
}

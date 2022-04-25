<?php

require "push-the-lead.php";

if($_POST){

    $app_base_url = "https://leads.vezoa.com/";

    $source_code = "G-SEA";

    $activity_code = "PAC";

    $lead_info = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'zipcode' => $_POST['zipcode'],
        'house_ownership_type' => $_POST['house_ownership_type'],
        'house_type' => $_POST['house_type'],
        'heating_type' => $_POST['heating_type'],
        /* Important always have the country code as bellow */
        '_zipcode_country' => 'FRA',
    ];


    vzlPushLead($lead_info, $app_base_url, $source_code, $activity_code);

}
<?php

$arr = array(
    "action: Added; quantity: 1; item_code: RNA1; product_name: Mens Organic T-shirt; colour: White; size: XL",
    "action: Subtracted; quantity: 7; item_code: RNC1; product_name: Kids Basic T-shirt; colour: Denim Blue; size: 3-4y",
    "action: Added; quantity: 20; item_code: RNV1; product_name: Gift Voucher; style: Mens; value: £20" 
);

# takes an array of string requests, and returns an array of associative arrays, representing those requests
function processRequests($requests) 
{
    $processed_requests = [];

    foreach ($requests as $request)
    {
        $processed_requests[] = processRequest($request);
    }

    return $processed_requests;
}

# takes a single request as a string, and returns request as an associative array of (name => value) pairs
function processRequest($request) 
{
    $processed_request = [];

    $name_value_pairs = explode(";", $request);

    foreach ($name_value_pairs as $nvp)
    {
        $name_value_split = explode(":", $nvp);

        $name = trim($name_value_split[0]);
        $value = trim($name_value_split[1]);

        $processed_request[$name] = $value;
    }

    return $processed_request;
}

print_r(processRequests($arr));
<?php

require __DIR__.'/vendor/autoload.php';


$client = new \GuzzleHttp\Client([
    'base_url' => 'http://localhost:8000',
    'defaults' => [
        'exceptions' => false
    ]
]);


$listPrice = '4.00';
$finishedGoods = true;
$makeFlag = true;
$productNumber = (string)rand(0,999);
$name = 'Iphone X';
$data = array(
    'name' => $name,
    'finishedGoods' => $finishedGoods,
    'productNumber' => $productNumber,
    'makeFlag' => $makeFlag,
    'listPrice' => $listPrice,
);
$response = $client->post('/api/products', [
    'body' => json_encode($data)
]);

try {
    $response = $client->get('/api/products');
}
catch (GuzzleHttp\Exception\ClientException $e) {
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
    var_dump($response);
    var_dump($responseBodyAsString);
}

echo $response;
echo "\n\n";




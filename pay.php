<?php
require_once('vendor/autoload.php');

use Paynow\Client;
use Paynow\Environment;
use Paynow\Exception\PaynowException;
use Paynow\Service\Payment;

$client = new Client('apiKey', 'apiPass', Environment::SANDBOX);
$orderReference = "success_1234567";
$idempotencyKey = uniqid($orderReference . '_');

$sum = empty($_POST['sum']) ? 1 : $_POST['sum'];

$paymentData = [
    'amount' => $sum * 100,
    'currency' => 'PLN',
    'externalId' => $orderReference,
    'description' => 'Payment description',
    'buyer' => [
        'email' => 'customer@domain.com'
    ]
];

try {
    $payment = new Payment($client);
    $result = $payment->authorize($paymentData, $idempotencyKey);
    header("Location: " . $result->getRedirectUrl());
    exit();
} catch (PaynowException $exception) {
    var_dump($exception);
}
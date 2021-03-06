<?php

require_once __DIR__ . '/vendor/autoload.php';

use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\Fields\CampaignFields;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (!isset($_GET["accessToken"])) {
    header('Location: /login.php');
    exit();
}

$app_id = $_ENV["FB_APP_ID"];
$app_secret = $_ENV["FB_APP_SECRET"];
$access_token = $_GET["accessToken"];
$account_id = "act_" . $_ENV["FB_AD_ACCOUNT"];

Api::init($app_id, $app_secret, $access_token);

$account = new AdAccount($account_id);
$cursor = $account->getCampaigns();

foreach ($cursor as $campaign) {
    echo $campaign->{CampaignFields::NAME}.PHP_EOL;
}

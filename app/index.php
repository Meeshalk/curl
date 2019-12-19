<?php
require __DIR__ . '\..\vendor\autoload.php';

use \Curl\Curl;
$curl = new Curl();
// scrapehub:6fa79172fd8749adb22c05792574c7ee:
// $url = "http://api.apify.com/v2/browser-info";
$url = "http://www.yad2.co.il/api/pre-load/getFeedIndex/vehicles/private-cars?page=1&compact-req=1&forceLdLoad=true";
// $url = "https://www.yad2.co.il/";
$proxy = 'http://proxy.apify.com:8000';
// $proxy = 'http://zproxy.lum-superproxy.io:22225';
// $proxy_auth = 'groups-SHADER,session-ses2,country-US:dnaR9JgFPTQFL2mRj7WMFjtwE';
$proxy_auth = 'auto:dnaR9JgFPTQFL2mRj7WMFjtwE';
// $proxy_auth = 'lum-customer-hl_70caf08e-zone-static:oprxcmjruy2r';
$curl->setOpts([
  // CURLOPT_PROXY => $proxy,
  // CURLOPT_PROXYUSERPWD => $proxy_auth,
  CURLOPT_HEADER => TRUE,
  CURLOPT_FOLLOWLOCATION => TRUE,
  CURLOPT_RETURNTRANSFER => TRUE,
  CURLOPT_CONNECTTIMEOUT => 30,
  CURLOPT_TIMEOUT => 180,
  CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36'
  // CURLOPT_CAINFO => '../cert/crawlera-ca.crt',
  // CURLOPT_SSL_VERIFYPEER => TRUE
]);
$curl->get($url);

if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    echo $curl->response;
} else {
    echo 'Response:' . "\n";
    echo $curl->response;
}

// $curl = curl_init('https://api.apify.com/v2/browser-info');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_PROXY, 'http://proxy.apify.com:8000');
// // Replace <YOUR_PROXY_PASSWORD> below with your password
// // found at https://my.apify.com/proxy
// curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'groups-BUYPROXIES94952,session-ses1:dnaR9JgFPTQFL2mRj7WMFjtwE');
// $response = curl_exec($curl);
// curl_close($curl);
// if ($response) echo $response;
?>

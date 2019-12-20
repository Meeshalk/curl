<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="direction: ltr;">
    <pre>

      <?php
      require __DIR__ . '/../vendor/autoload.php';
      set_time_limit(55);
      use \Curl\Curl;
      function writeLog($s){
        $log = fopen('acc_log.log', 'a+');
        if($log != false){
          fwrite($log, "[".date('Y-m-d H:i:s')."] ".$s.PHP_EOL);
        }
        fclose($log);
      }
      $curl = new Curl();
      for ($i=0; $i < 25; $i++) {
        $url = "http://www.yad2.co.il/api/pre-load/getFeedIndex/vehicles/private-cars?page=1&compact-req=1&forceLdLoad=true";
        $curl->setOpts([
          CURLOPT_HEADER => TRUE,
          CURLOPT_FOLLOWLOCATION => TRUE,
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_CONNECTTIMEOUT => 30,
          CURLOPT_TIMEOUT => 180,
          CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36'
        ]);
        $curl->get($url);
        $cLenth = strlen($curl->response);
        if($cLenth <= 35000)
          $cType = "Blocked";
        else
          $cType = "Allowed";
        if ($curl->error) {
          writeLog('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . " Content Length: ".$cLenth . " Content Type: ".$cType);
        } else {
          writeLog('Success: ' . $curl->getHttpStatusCode() . " :  Content Length: ".$cLenth . " Content Type: ".$cType);
        }
      }
      ?>

    </pre>
    <h1>My Page2!</h1>
  </body>
</html>

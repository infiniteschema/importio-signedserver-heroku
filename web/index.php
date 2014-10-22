<?php

require('../vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->match('/', function(Request $request) use($app) {
  $app['monolog']->addDebug('logging output.');

  $headers = array();
  $headers['Content-type'] = "application/json";
  $headers['Access-Control-Allow-Origin'] = $request->headers->get('ORIGIN', "*", true);
  $headers['Access-Control-Allow-Credentials'] = "true";
  //$headers['Access-Control-Allow-Methods'] = "GET, POST, OPTIONS";
  //$headers['Access-Control-Allow-Headers'] = "Origin, Content-Type, Accept, Authorization, X-Request-With";

  $signed = sign(file_get_contents('php://input'));
  return new Response($signed, 200, $headers);
});

$app->run();

function sign($query) {
  $userGuid = getenv("USER_GUID");
  $apiKey = getenv("API_KEY");
  $orgGuid = getenv("ORG_GUID") ? getenv("ORG_GUID") : "00000000-0000-0000-0000-000000000000"; // looking forward
  $expiryHours = getenv("EXPIRY_HOURS") ? getenv("EXPIRY_HOURS") : 24;
  $expiry = (time() + (60*60*$expiryHours)) * 1000; // This expires in 24 hours. Set this to $expiry = "null"; for no expiry

  include('my.php');
  my_validate($query); // passed by reference

  $check = $query . ":" . $userGuid . ":" . $expiry;
  $digest = base64_encode(hash_hmac("sha1", $check, base64_decode($apiKey), true));

  $signedQuery = array("queryJson" => $query, "expiresAt" => $expiry, "userGuid" => $userGuid, "orgGuid" => $orgGuid, "digest" => $digest);
  return json_encode($signedQuery);
}

?>

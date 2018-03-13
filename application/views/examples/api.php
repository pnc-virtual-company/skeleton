<h1>API Call with GuzzleHTTP</h1>

<p>
  This is the result of the code below.
  Please visit the <a target="_blank" href="http://docs.guzzlephp.org/en/stable/">documentation</a> for more help.
</p>

<pre>
  require_once FCPATH . "vendor/autoload.php";

  $client = new GuzzleHttp\Client();
  $res = $client->request('GET', base_url() . 'examples/backend/rest/time/server');

  echo $res->getStatusCode();
  // "200"
  echo var_dump($res->getHeader('content-type'));
  // 'application/json; charset=utf8'
  echo $res->getBody();
  // {"type":"User"...'
</pre>

<h2>Result</h2>
<?php
require_once FCPATH . "vendor/autoload.php";

$client = new GuzzleHttp\Client();
$res = $client->request('GET', base_url() . 'examples/backend/rest/time/server');

echo $res->getStatusCode();
// "200"
echo var_dump($res->getHeader('content-type'));
// 'application/json; charset=utf8'
echo $res->getBody();
// {"type":"User"...'

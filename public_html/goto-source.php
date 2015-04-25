<?php
$file = $_GET['file'];
$line = $_GET['line'];
$col  = $_GET['col'];

$url  = 'http://localhost:63342';
$data = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<methodCall>
  <methodName>fileOpener.openAndNavigate</methodName>
  <params>
   <param><value><string>$file</string></value></param>
   <param><value><int>$line</int></value></param>
   <param><value><int>$col</int></value></param>
  </params>
</methodCall>
XML;


// use key 'http' even if you send the request to https://...
$options = [
  'http' => [
    'header'  => "Content-type: application/xml\r\n",
    'method'  => 'POST',
    'content' => $data
  ]
];
$context = stream_context_create ($options);
$result  = file_get_contents ($url, false, $context);

if ($result !=
    '<?xml version="1.0"?><methodResponse><params><param><value><boolean>1</boolean></value></param></params></methodResponse>'
) {
  echo "<p>An error occurred.</p><p>Response from the IDE:</p>" . htmlspecialchars ($result);
  exit;
}
?>
<script>
  alert ('Please switch to PHPStorm / IDEA to view the code at the error location.');
  history.back ();
</script>
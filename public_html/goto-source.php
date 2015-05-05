<?php
$file         = $_GET['file'];
$line         = $_GET['line'];
$col          = $_GET['col'];
$feedbackElem = "parent.document.getElementById ('__feedback')";

echo "<script>$feedbackElem.style.display = 'none'</script>";

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
): ?>
  <script>
    <?=$feedbackElem?>.innerHTML =
      'Unable to open the file for editing on PHPStorm / IDEA; either the file was not found or the IDE is not running.<p>File: <?=$file?>';
    <?=$feedbackElem?>.style.display = 'block'
  </script><?php
  exit;
endif;

// Try to activate the IDE application window.
// Note: Apache must be running with the same user as the logged in user for this to work.
// Edit httpd.conf to set the user and group Apache runs on.

$cmd = "osascript -e 'tell application \"%s\" to activate'";
// Try the following names, in order.
$names = ['PHPStorm EAP', 'PHPStorm', 'IDEA'];
// If the IDE name is configured via environment variable, try that name first.
if (isset($_ENV['IDEA']))
  array_unshift ($names, $_ENV['IDEA']);

foreach ($names as $app) {
  system (sprintf ($cmd, $app), $code);
  if (!$code) break;
}

// If it was not possible to activate, warn the user.

if ($code): ?>
  <script><?=$feedbackElem?>.style.display = 'block'</script>
<?php endif;
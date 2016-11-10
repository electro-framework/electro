<?php
$file         = $_GET['file'];
$line         = $_GET['line'];
$col          = $_GET['col'];
$feedbackElem = "parent.document.getElementById ('__feedback')";

echo "<script>$feedbackElem.style.display = 'none'</script>";

exec ("phpstorm --line $line $file", $out, $status);

if ($status)
  exec ("/usr/local/bin/phpstorm --line $line $file", $out, $status);

if ($status): ?>
  <script>
    <?=$feedbackElem?>.innerHTML =
      '<h4>Unable to open the file for editing on PHPStorm / IDEA</h4><p><b>Hint:</b> have you run <code>Tools -> Create Command-line Launcher...</code> yet?<p><b>Hint:</b> try installing the script at <code>/usr/local/bin</code> (on Mac or Linux)';
    <?=$feedbackElem?>.style.display = 'block';
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

<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

//pwd = print working directory
$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

?>


<?php
$filename = '/var/www/html/spencer/spencerPHP/test';

if (file_exists($filename)) {
    echo "The file $filename";
    echo "   - exists";
} else {
    echo "The file $filename";
      echo "   - does not exist";
}
?>

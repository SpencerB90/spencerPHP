<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

//pwd = print working directory
$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

?>



<?php
$folder = file_exists("test");

if ($folder){
  $folder = is_dir("test");
  if ($folder) {
    echo "test exists, and is folder/n";

    $testArray = scandir("test/");

    foreach ($testArray as $key=>$value) {
      if ($value == "." || $value == "..") {
        continue;
      }
      echo $value . "<br/>";
    }

  }
  else{
    echo "test exisits and is file";
  }
}
else{
  echo"making test now";
  mkdir("test");
}
?>


<!-- $filename = '/var/www/html/spencer/spencerPHP/test';

//checks for files and directories

//isdir

if (file_exists($filename)) {
    echo "The file $filename";
    echo "<br>- exists";
} else {
    echo "The file $filename";
      echo "<br>- does not exist";
} -->

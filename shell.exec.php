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
    echo "test exists, and is folder" . "</br>"  . "</br>";

    //getting files from folder test
    $testArray = scandir("test/");

    //printing out the array of files
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

<?php

$users = shell_exec('w');
$usersExplode = explode("\n", $users);

foreach ($usersExplode as $key => $value) {
  if ($key == "0" || $key == "1") {  continue; }

//substr gives portion of a string
$username = substr($value, 0, strpos($value, ' '));
echo $username . "<br>"
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

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
    echo "test exists, and is folder";
  }
  else{
    echo "test exisits and is file";
  }
}
else{
  mkdir("test");
}
?>

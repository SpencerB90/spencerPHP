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
if ($_SESSION["UserID"]!="" && $_SESSION["UserID"]!="Guest") {
    $sql = "update users set lastaccess=now() where username='".$_SESSION["UserID"]."'";
    CustomQuery($sql);
}

 ?>
 <?php

 $minutes=10;
 $dispUsers=20;
 $t=date('Y-m-d H:i:s', time()-$minutes*60);
 // display users who were active in last 10 minutes

 $users=DBLookup("select count(*) from invusers where lastaccess > '".$t."'");
 if ($users>0) {
     $sql="select * from invusers where lastaccess > '".$t."'";  
     $rs=CustomQuery($sql);

     if ($data = db_fetch_array($rs)) {
         echo $users." active user(s): ".$data["username"];
     }
     $count=1;
     while ($data = db_fetch_array($rs)) {
       if ($count<$dispUsers) {
             $count++;
             echo ", ".$data["username"];
       }
         else {
             echo " ...";
             break;
         }
     }
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

<?php
//checks to see if session is started
if (!isset($_SESSION)) {
  session_start();
}
//if username not in database, will move them to login page
if (!isset($_SESSION['username'])) {
  //die("Don't even try mate");
  //before html cant but put at bottom, must be at top
  //when you use header you need 'location: then where you are going to'
  header('Location: login.php'); //if you wanted https address you need full url
}

if (isset($_GET['id']) && $_GET['edit']=="edit"){
  require('dbConnect.php'); //bring in database connection
  $sql = "SELECT * FROM users WHERE userid = " . $_GET['id']; // id is int datatype don't qoute it
  $result = $conn->query($sql);

  echo "<form action=\"\" method=\"post\">";

  while ($row = $result->fetch_assoc()){
  echo "<input name=\"userid\" type=\"text\" disabled value=\"" . $row['userid'] . "\">";
  echo"<br />";
  echo "<input name=\"username\" type=\"text\" value=\"" . $row['username'] . "\">";
  echo"<br />";
  echo "<input name=\"password\" type=\"text\" value=\"" . $row['password'] . "\">";
  echo"<br />";
  echo "<input type=\"submit\" id=\"myAdd\" name=\"submit\" value=\"change\">";
  }

echo "</form>";

}
else {
  echo "You should not be here.";
}

if (isset($_GET['myAdd']))
{
$username = $_GET['username'];
$password = $_GET['password'];

$password = password_hash($password, PASSWORD_BCRYPT);
$sql ="UPDATE users set (username,password) VALUES ('$username','$password')";
$conn->query($sql);
}

echo '<form action = "users.php" method = "post">';

?>

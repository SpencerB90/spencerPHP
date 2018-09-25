<?php
// check to see if session is started
if (!isset($_SESSION)) {
  session_start();
}
//if username not logged in, will move them to login page
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}

//bring in database connections
//remember if your connection page is named different change
require('dbConnect.php');

//kill == delete
if (isset($_POST['id']) && isset($_POST['kill'])){
  $sql = "DELETE FROM users WHERE userid =" . $_POST['id'];
  //exacute Query
  $result = $conn->query($sql);
}

//create the sql Query
$sql = "SELECT * from users;";

//exacute the sql query
$result = $conn->query($sql);
//close db connection
$conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

<table>
<tr>
  <!--key names-->
  <th>User id </th>
  <th>Username </th>
  <th>Password Hash</th>
  <th>Actions</th>
<tr>

<?php
//using \ before " makes it read a single ', but in html will read as "
//loop through all table records
//kill == delete
while($row = $result->fetch_assoc()){
  echo "<tr>";
  echo "<td>" . $row['userid'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";

  echo "<td>
  <form action=\"edituser.php\" method=\"get\">
  <input type=\"hidden\" name=\"id\" value=\"" . $row['userid'] . "\">
  <input type=\"submit\" value=\"edit\" name=\"edit\">
  </form>
  </td>";

  echo "<td>
  <form action=\"\" method=\"post\">
    <input name = \"id\" type=\"hidden\" value=\"" . $row['userid'] . "\">
    <input type =\"submit\" value=\"delete\" name=\"kill\">
  </form>  </td>";


  echo "</tr>";
}
?>
</table>

</body>
 </html>

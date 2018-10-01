
<?php

echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? "<a href=users.php><strong>Users |</strong></a>" : "<a href=users.php>Users</a>";



echo (basename($_SERVER['PHP_SELF']) == 'uploads.php') ? "<a href=uploads.php><strong> Uploads | </strong></a>" : "<a href=uploads.php>Uploads</a>";


?>

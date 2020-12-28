<?php
session_start();
if(isset($_SESSION['uname']))
{
    echo "Welcome " .   $_SESSION['uname'] . " Password:" . $_SESSION['password'];
    if(isset($_REQUEST['logout'])){
        session_unset();
        session_destroy();
        echo "<script> location.href='login.php'; </script>";
    }
}
else{
    echo "<script> location.href='login.php'; </script>";
}


?>
<div>
    <body>
        <form action="" method="POST">
        <input type="submit" value="Logout" name="logout">
        </form>

    </body>
</div>
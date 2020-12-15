<?php
session_start();
session_destroy();

require_once "../../config/connect.php";


echo "You have been logged out successfully";

echo "<script>"."window.location.replace('../../index.php')"."</script>"; 


?>
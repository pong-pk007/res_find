<?php
    include "./config/connection.php";
    @session_start();
    session_destroy();
echo "<script>window.location='login_page.html'</script>";
?>
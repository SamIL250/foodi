<?php
    include './src/layout/layout_start.php';
    if(!isset($_SESSION['user_data'])) {
        include './unauthorized.php';
    } else {
        include './src/pages/profile/main.php';
    }
    include './src/layout/layout_end.php';

?>
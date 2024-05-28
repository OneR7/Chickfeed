<?php
    session_destroy();
    header('Location: ' . BASEURL . '/?controller=login'); 
    exit();
?>
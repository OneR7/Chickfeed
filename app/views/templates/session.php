<?php
if (!isset($_SESSION['id_peternak'])) {
    error_log("Session not set, redirecting to login.");
    header('location: ' . BASEURL . '/?controller=login');
    exit();
}
?>
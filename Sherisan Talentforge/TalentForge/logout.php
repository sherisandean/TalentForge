<?php
// Start the session (if not already started)
session_start();

// Destroy the session
session_destroy();

// Redirect to the home page or login page
$redirect_url = "TalentForgeHomePage.php";
header("Location: $redirect_url");
exit;
?>

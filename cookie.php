<?php
date_default_timezone_set('Asia/Kolkata');

$expiry_time = time() + (60 * 60 * 24); 
setcookie('last_visit', date('Y-m-d g:i:s A'), $expiry_time);

$last_visit_message = '';
if (isset($_COOKIE['last_visit'])) {
    $last_visit_message = "Your last visit was on: " . $_COOKIE['last_visit'];
} else {
    $last_visit_message = "This is your first visit or cookies are not enabled.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h2>Your last visited time on the webpage</h2>
    <p><?php echo $last_visit_message; ?></p>
</body>
</html>

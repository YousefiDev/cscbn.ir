<?php
$name = $_GET['name'];
$lastname = $_GET['lastname'];
$type = $_GET['type'];

echo "<html><head><link rel='stylesheet' href='style.css'></head><body><div class='container'>";
echo "<h2>ثبت‌نام شما با موفقیت انجام شد</h2>";
echo "<p>نام: $name</p>";
echo "<p>نام خانوادگی: $lastname</p>";
echo "<p>نحوه شرکت: $type</p>";
echo "</div></body></html>";
?>
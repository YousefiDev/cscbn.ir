<!DOCTYPE html>
<html>
<head>
    <title>اطلاعات مقاله</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<?php
$name = $_GET['name'];
$lastname = $_GET['lastname'];
$count = $_GET['count'];

echo "<h2>ثبت اطلاعات $count مقاله</h2>";
echo "<form method='get' action='final.php'>";
echo "<input type='hidden' name='name' value='$name'>";
echo "<input type='hidden' name='lastname' value='$lastname'>";
echo "<input type='hidden' name='type' value='article'>";

for ($i = 1; $i <= $count; $i++) {
    echo "<fieldset><legend>مقاله $i</legend>";
    echo "<label>نویسنده اول - نام:</label><input type='text' name='author1_name_$i' required>";
    echo "<label>نویسنده اول - ایمیل:</label><input type='email' name='author1_email_$i' required>";
    echo "<label>نویسنده اول - سمت:</label><input type='text' name='author1_role_$i' required>";
    echo "<label>نویسنده دوم - نام:</label><input type='text' name='author2_name_$i'>";
    echo "<label>نویسنده دوم - ایمیل:</label><input type='email' name='author2_email_$i'>";
    echo "<label>نویسنده دوم - سمت:</label><input type='text' name='author2_role_$i'>";
    echo "<label>عنوان فارسی:</label><input type='text' name='title_fa_$i' required>";
    echo "<label>عنوان لاتین:</label><input type='text' name='title_en_$i' required>";
    echo "</fieldset><br>";
}
echo "<input type='submit' value='تایید نهایی'>";
echo "</form>";
?>
</div>
</body>
</html>
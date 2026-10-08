<!DOCTYPE html>
<html>
<head>
    <title>فرم ثبت‌نام</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>فرم ثبت‌نام</h2>
    <form method="get" action="submit_registration.php">
        <label>کد ملی:</label>
        <input type="text" name="code" required>
        <label>نام:</label>
        <input type="text" name="name" required>
        <label>نام خانوادگی:</label>
        <input type="text" name="lastname" required>
        <label>ایمیل:</label>
        <input type="email" name="email" required>
        <label>نحوه شرکت:</label><br>
        <input type="radio" name="type" value="free" required> شرکت آزاد<br>
        <input type="radio" name="type" value="article"> ارسال مقاله<br>
        <input type="radio" name="type" value="poster"> ارائه پوستر<br><br>
        <input type="submit" value="ادامه">
    </form>
</div>
</body>
</html>
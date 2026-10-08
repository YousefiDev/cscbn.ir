<?php

function is_valid_national_code($code) {
    if (!preg_match('/^\d{10}$/', $code)) return false;
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
        $sum += (int)$code[$i] * (10 - $i);
    }
    $remainder = $sum % 11;
    $control = (int)$code[9];
    if ($remainder < 2) {
        return $control === $remainder;
    } else {
        return $control === (11 - $remainder);
    }
}


if (!is_valid_national_code($_GET['code'])) {
    die("<html><head><link rel='stylesheet' href='style.css'></head><body><div class='container'><h2>خطا</h2><p>کد ملی وارد شده نامعتبر است.</p></div></body></html>");
}

$name = $_GET['name'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$type = $_GET['type'];
$code = $_GET['code'];

echo "<html><head><link rel='stylesheet' href='style.css'></head><body><div class='container'>";

echo "<h2>اطلاعات شما</h2>";
echo "<p>نام: $name</p>";
echo "<p>نام خانوادگی: $lastname</p>";
echo "<p>ایمیل: $email</p>";
echo "<p>کد ملی: $code</p>";

if ($type == 'free') {
    echo "<h3>نوع ثبت‌نام: شرکت آزاد</h3>";
    echo "<p>هزینه همایش: ۲۵۰ هزار تومان</p>";
    echo "<a href='final.php?name=$name&lastname=$lastname&type=$type'>می‌خواهم شرکت کنم</a>";
} elseif ($type == 'poster') {
    echo "<h3>نوع ثبت‌نام: ارائه پوستر</h3>";
    echo "<p>نیازی به ارسال اطلاعات نیست.</p>";
    echo "<a href='final.php?name=$name&lastname=$lastname&type=$type'>تایید ثبت‌نام</a>";
} elseif ($type == 'article') {
    echo "<h3>نوع ثبت‌نام: ارسال مقاله</h3>";
    echo "<form method='get' action='article_info.php'>
            <input type='hidden' name='name' value='$name'>
            <input type='hidden' name='lastname' value='$lastname'>
            <label>تعداد مقاله (۱ تا ۳):</label>
            <input type='number' name='count' min='1' max='3' required>
            <input type='submit' value='ادامه'>
        </form>";
}

echo "</div></body></html>";
?>
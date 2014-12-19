<?php 
session_start();
// создаем ресурс из изображения
$img_captcha = imagecreatefromjpeg('images/design/bg-captcha.jpg');
// создаем объект цвета
$color = imagecolorallocate($img_captcha, 0, 0, 0);
//  сглаживания
// imageantialias($img_captcha, true);
// устанавливаем количество символов в капче
$numChars = 5;
// генерируем случайную строку
$randStr = substr(md5(uniqid()), 0, $numChars);
// занесение случайной строки в сессию
$_SESSION['randStrn'] = $randStr;

// установка координат начала отрисовки текста
$x = 20;
$y = 50;
$deltax = 30;
// отрисовка картинки
for($i = 0; $i < $numChars; $i++) { 
	// получаем случайный размер текста
	$size = rand(20, 40);
	// получаем случайный угол поворота текста
	$angle = rand(-25, 25);
	// отрисовка картинки
	imagettftext($img_captcha, $size, $angle, $x, $y, $color, 'fonts/cour.ttf', $randStr[$i]);
	// сдвигаем курсор по координате Х
	$x += $deltax;
}
// Выводим изображение на экран и удаляем его из памяти
header('Content-Type: image/jpeg');
imagejpeg($img_captcha, null, 90);
imagedestroy($img_captcha);
?>
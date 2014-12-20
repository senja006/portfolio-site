<?php  
// открываем сессию
session_start();
require_once 'config.php';
// получаем объект подключения к БД
$pdo = connectToDB();

// получаем данные из формы
$login = htmlspecialchars(strip_tags(trim($_POST['login'])), ENT_QUOTES);
$password = $_POST['pass'];
// делаем запрос на проверку пользователя в БД
$sql = "SELECT COUNT(users.id) AS cnt FROM users WHERE users.login = '{$login}' AND users.password = '{$password}'";
$result = $pdo->query($sql);
$res = $result->fetch(PDO::FETCH_ASSOC);
$data = array();
// Если пользователь есть в БД
if($res['cnt'] == 1) {
	$_SESSION['auth'] = true;
	$data['login_status'] = 'true';
}else{
	$data['login_status'] = 'false';
}

echo json_encode($data);
exit;
?>
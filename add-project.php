<?php
require_once 'config.php';

// Название проекта
$projectName = htmlspecialchars(strip_tags(trim($_POST['projectName'])), ENT_QUOTES);
// URL проекта
$projectUrl = trim($_POST['projectUrl']);
// Описание проекта
$projectDesc = $_POST['text'];
// Файл с картинкой
$fileurl = 'images/content/work/'.$_POST['file-name'];
$data = array();
if(empty($projectName) || empty($projectUrl) || empty($projectDesc)) {
	$data['project_status'] = 'false';
}else{
	$pdo = connectToDB();
	$sql = "INSERT INTO portfolio VALUES (NULL, '$projectName', '$fileurl', '$projectUrl', '$projectDesc')";
	// Если все нормально добавлено в БД
	if($pdo->exec($sql)) {
		$data['title'] = $projectName;
		$data['url'] = $projectUrl;
		$data['img'] = $fileurl;
		$data['desc'] = $projectDesc;
		$data['project_status'] = 'true';
	}else{
		$data['project_status'] = 'false';
	}
}

// выводим результат в JSON
echo json_encode($data);
exit;
?>
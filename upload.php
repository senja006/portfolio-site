<?php  

// $data = array();
// $error = false;
// $files = array();

// $uploaddir = "images/content/work/";
// foreach($_FILES as $file)
// {
// 	if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
// 	{
// 		$files[] = $uploaddir .$file['name'];
// 	}
// 	else
// 	{
// 	    $error = true;
// 	}
// }
// $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);

// echo json_encode($data);
// exit;

// путь к папке для загрузки
$uploadDir = "images/content/work/";
// устанавливаем валидные MYME-types
$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
// Устанавливаем максимальный размер файла
$file_size = 2097152; // 2МБ
// Получаем данные из глобального массива
$file = $_FILES[0];

// Массив с результатами обработки скрипта
$data = array();

// Если размер файла больше максимально допустимого
if($file['size'] > $file_size) {
	$data['file_status'] = 'false';
	$data['url'] = '';
}
// проверка типа
else if(!in_array($file['type'], $types)) {
	$data['file_status'] = 'false';
	$data['url'] = '';
}
// Если ошибок нет
else if($file['error'] == 0) {
	// получаем имя файла
	$filename = basename($file['name']);
	// получаем расширение файла
	// $extensions = pathinfo($file['name'], PATHINFO_EXTENSIONS);
	// перемещаем файл из временной папки в нужную
	if(move_uploaded_file($file['tmp_name'], $uploadDir.$filename)) {
		$data['file_status'] = 'true';
		$data['url'] = $uploadDir.$filename.'.'.$extensions;
		$data['name'] = $filename;
	}else{
		$data['file_status'] = 'false';
		$data['url'] = '';
	}
}

// Выводим результаты в JSON и завершаем скрипт
echo json_encode($data);
exit;
?>
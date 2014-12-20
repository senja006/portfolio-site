<?php  
// путь к папке для загрузки
$uploadDir = "images/content/work/";
// устанавливаем валидные MYME-types
$type = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
// Устанавливаем максимальный размер файла
$file_size = 2097152; // 2МБ
// Получаем данные из глобального массива
$file = $_FILES['files'];
// Массив с результатами обработки скрипта
$data = array();

// Если размер файла больше максимально допустимого
if($file['size'][0] > $file_size) {
	$data['file_status'] = 'false';
	$data['url'] = '';
}
// проверка типа
else if(!in_array($file['type'][0], $types)) {
	$data['file_status'] = 'false';
	$data['url'] = '';
}
// Если ошибок нет
else if($file['error'][0] == 0) {
	// получаем имя файла
	$filename = basename($file['name'][0]);
	// получаем расширение файла
	$extensions = pathinfo($file['name'][0], PATHINFO_EXTENSIONS);
	// перемещаем файл из временной папки в нужную
	if(move_uploaded_file($file['tmp_name'][0], $uploadDir.$filename.'.'.$extensions)) {
		$data['file_status'] = 'true';
		$data['url'] = $uploadDir.$filename.'.'.$extensions;
		$data['name'] = $filename;
	}else{
		$data['file_status'] = 'false';
		$data['url'] = '';
	}

// Выводим результаты в JSON и завершаем скрипт
echo json_encode($data);
exit;
}
?>
<?php
/**
*@peram string $fileName имя файла без расширения
*@peram string $path имя файла без расширения
*/
function upload ($fileName, $path = null)
{
	if(!$path){
		$path = dirname(__DIR_).'/upload';
	}
	if(!is_dir($path)){
		die(sprintf("Нет пути", $path));
	}
	$type = $_FILES['file']['type'];
	$tmpPath = $_FILES['file']['tmp_name'];
	$fullName = generateName($fileName, $type);
	if(file_exists($tmpPath)){
		copy($tmpPath, $path.'/'.$fullName);
		return $fullName;
	}else{
		die(sprintf("Не нашел файл %s", $tmpPath));
	}
}
function generateName($name, $type)
{
	$map =[
		'image/jpeg' => '.jpg',
		'image/png' => '.png'
	];
	 foreach ($map as $key => $u){
                if($key == $type){
                    return $name.$map[$type];
                }
        }
        die(sprintf("Не верный тип файла %s", $type));	
}

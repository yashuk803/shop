<?php
define ('DIR_DB', dirname(__DIR__).'/db');
define('FL_DATA', DIR_DB.'/data.json');

_init();

function _init()
{
	if(!is_dir(DIR_DB)){
		mkdir(DIR_DB);
	}
	if(!file_exists(FL_DATA)){
		file_put_contents(FL_DATA, '');
	}
}
function save($data)
{
	if(!is_array($data)){
		return false;
	}
	$items = [];
	$items = json_decode(file_get_contents(FL_DATA),true);
    array_push($items, $data);
    $str = json_encode(array_values($items));
	return  file_put_contents(FL_DATA, $str);
}

function find($data)
{
	$datas = json_decode(file_get_contents(FL_DATA), true);
        foreach ( $datas as $data){
            if($data['id'] === $data){
                return $data;
            }
        }
}
 function findAll()
 {
 	$datas = json_decode(file_get_contents(FL_DATA), true);
 	return (is_array($datas) && count($datas) > 0) ? $datas : null;
 }

 function clear()
 {
 	 return file_put_contents(FL_DATA, json_encode([]));
 }

 function delet($data)
 {
 	 if(empty($data)){
        return false;
    }
    $items = [];
    if(file_exists(FL_DATA)){
        $items = json_decode(file_get_contents(FL_DATA), true);
            foreach ($items as $key => $i){
                if($i['name'] == $data){
                    unset($items[$key]);
                }
            }
        
    }
    return file_put_contents(FL_DATA, json_encode(array_values($items)));
 }
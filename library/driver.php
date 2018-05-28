<?php
define('DB_DIR',  __DIR__.'/../data');
define('DB_USERS', DB_DIR.DIRECTORY_SEPARATOR.'users.json');
_init();
function _init()
{
    if(!is_dir(DB_DIR)){
        try{
            mkdir(DB_DIR);
        }catch (\Exception $e){
            throw new \Exception(sprintf("Не удалось создать каталог 'data'. Причина %s.\n Попробуй вручную",
                $e->getMessage()));
        }
    }
}
function save($user)
{
    if(!is_array($user)){
        throw new \Exception("An array is expected");
    }
    $users = [];
    if(file_exists(DB_USERS)){
        $users = json_decode(file_get_contents(DB_USERS), true);
        if(is_array($users) && count($users) > 0){
            foreach ($users as $key => $u){
                if($u['id'] == $user['id']){
                    unset($users[$key]);
                }
            }
        }
    }
    array_push($users, $user);
    return file_put_contents(DB_USERS, json_encode(array_values($users)));
}
function find($id)
{
    if(!file_exists(DB_USERS)){
        return null;
    }
    try{
        $users = json_decode(file_get_contents(DB_USERS), true);
        foreach ($users as $user){
            if($user['id'] === $id){
                return $user;
            }
        }
        return null;
    }catch (\Exception $e){
        return null;
    }
}
function findAll()
{
    try{
        $users = json_decode(file_get_contents(DB_USERS), true);
        return (is_array($users) && count($users) > 0) ? $users : null;
        return null;
    }catch (\Exception $e){
        return null;
    }
}
function clear()
{
    return file_put_contents(DB_USERS, json_encode([]));
}
function delete($id)
{
    if(empty($id)){
        throw new \Exception("An id is expected");
    }
    $users = [];
    if(file_exists(DB_USERS)){
        $users = json_decode(file_get_contents(DB_USERS), true);
        if(is_array($users) && count($users) > 0){
            foreach ($users as $key => $u){
                if($u['id'] == $id){
                    unset($users[$key]);
                }
            }
        }
    }
    return file_put_contents(DB_USERS, json_encode(array_values($users)));
}
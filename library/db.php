<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "shopProduct";
$port = 3306;
$charset = "utf8";


$conn = new PDO(
            "mysql:host=".$servername.";port=".$port.";dbname=".$dbname.";charset=".$charset,
            $username,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

if (!$conn) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
// prepare and bind
function addarticle($title, $description, $pathImage, $updated_at = NULL, $created_at = ""){
	global $conn;
	$created_at = date("Y-m-d H:i:s");
	$stmt = $conn->prepare("INSERT INTO articles (title, description, pathImage, updated_at, created_at) VALUES (?, ?, ?,?,?)");
	$stmt->bindParam( 1, $title, SQLITE3_TEXT);
	$stmt->bindParam( 2, $description, SQLITE3_TEXT);
	$stmt->bindParam( 3, $pathImage, SQLITE3_TEXT);
	$stmt->bindParam( 4, $updated_at, SQLITE3_TEXT);
	$stmt->bindParam( 5, $created_at, SQLITE3_TEXT);
	$stmt->execute();
}
function get($table){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM  {$table}");
	$stmt->execute();
	return $stmt->fetchAll();
}
function addBrandCat($name, $description, $publish = 0, $table){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO {$table} (name, description, publish) VALUES (?, ?, ?)");
	$stmt->bindParam( 1, $name, SQLITE3_TEXT);
	$stmt->bindParam( 2, $description, SQLITE3_TEXT);
	$stmt->bindParam( 3, $publish, SQLITE3_NULL);
	$stmt->execute();
}
function addproduct($name, $articul, $idBrand,  $image_path, $description, $price, $category_id, $publish = 0,  $updated_at = NULL, $created_at = "")
{
	global $conn;
	$created_at = date("Y-m-d H:i:s");
	$stmt = $conn->prepare("INSERT INTO products (name, articul, idBrand, image_path, description, price, category_id, publish,  updated_at, created_at) VALUES (?, ?, ?,?,?,?,?,?,?, ?)");
	$stmt->bindParam( 1, $name, SQLITE3_TEXT);
	$stmt->bindParam( 2, $articul, SQLITE3_TEXT);
	$stmt->bindParam( 3, $idBrand, SQLITE3_INTEGER);
	$stmt->bindParam( 4, $image_path, SQLITE3_TEXT);
	$stmt->bindParam( 5, $description, SQLITE3_TEXT);
	$stmt->bindParam( 6, $price, SQLITE3_BLOB);
	$stmt->bindParam( 7, $category_id, SQLITE3_INTEGER);
	$stmt->bindParam( 8, $publish, SQLITE3_INTEGER);
	$stmt->bindParam( 9, $updated_at, SQLITE3_TEXT);
	$stmt->bindParam( 10, $created_at, SQLITE3_TEXT);
	$stmt->execute();
}
function search ($str)
{
	$param = '%'.$str."%";
	global $conn;
	$stmt = $conn->prepare("SELECT products.name, brand.name AS nameBrand FROM products LEFT JOIN brand ON products.idBrand = brand.id where UPPER(products.name) LIKE(?) OR  UPPER(brand.name ) LIKE(?)");
	$stmt->bindParam( 1, $param, SQLITE3_TEXT);
	$stmt->bindParam( 2, $param, SQLITE3_TEXT);
	$stmt->execute();
	//$stmt2 = $conn->prepare("SELECT () FROM {$stmt} WHERE MATCH (products.name, brand.name ) AGAINST ('b')");


	
	//$stmt->execute();
	return $stmt->fetchAll();
}

?>
<?php
$dbUsername = "g614";
$dbPassword = "DiplomaGroup614";
$id = $_POST["id"];
 
try {
	$json_data = array();
    //соединение с БД
    $dbcon = new PDO('mysql:host=localhost;dbname=pract', $dbUsername, $dbPassword);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
   //получаем данные
    $data = $dbcon->query('SELECT * FROM Seleznev ORDER BY id');
 
    //выводим результат
    foreach($data as $rows) {
		array_push($json_data, 
			array(
				"id" => $rows["id"],
				"name" => $rows["name"],
				"position" => $rows["position"]
			)
		);
        //print_r($rows);
    }
	echo json_encode($json_data);
 
} catch(PDOException $e) {
    echo 'Ошибка: ' . $e->getMessage();
}
?>

<?php
/**
ONLY FOR TEST TASK)
 */

require_once "db.php"; // подключаю конфиг с БД

$start = $_POST['start']; // принимаю переменную точки отправки при помощи метода POST
$finish = $_POST['finish']; // принимаю переменную точки прибытия при помощи метода POST
$startd = "'".$_POST['start']."'"; // для удобства, создаю себе переменную для запросов в БД
$finishd = "'".$_POST['finish']."'"; 


$select = "SELECT name,phone FROM carriers WHERE zip1 = $startd or zip2 = $startd or zip3 = $startd or zip4 = $startd or zip5 = $startd"; //SQL-запрос в БД для поиска начальной точки и перевозчика
if($result = $conn->query($select)){ // создаю условие на успешное выполнение запроса)
		foreach($result as $row){ // перебираю все элементы массива с помощбю цикла foreach
    		$name[] = $row['name']; // принимаю и сортирую переменные
    		$phone[] = $row['phone'];
		}
}

$select1 = "SELECT id,name,phone FROM carriers WHERE zip1 = $finishd or zip2 = $finishd or zip3 = $finishd or zip4 = $finishd or zip5 = $finishd"; //ещё один SQL-запрос в БД для поиска конечной точки и перевозчика
if($result1 = $conn->query($select1)){ // ещё раз создаю условие на успешное выполнение запроса)
		foreach($result1 as $row1){ // ещё раз перебираю все элементы массива с помощбю цикла foreach
    		$name1[] = $row1['name'];// ещё раз принимаю и сортирую переменные
    		$phone1[] = $row1['phone'];
		}
}

$myObj = new stdClass(); // создаю клас для проверки наличия перевозчика в заданых регионах посредством поиска в совпадающих имён компаний-перевозчика в массиве
$myObj->link[] = "https://www.google.com/maps/dir/$start/$finish"; // создаю ссылку на Google Maps
foreach(array_combine($name, $phone) as $n => $p){ //объединяю два массива для проверки совпадающих имён компании-перевозчика и вывода их номера телефона
		if (in_array($n, $name1)){ // проверяю, есть ли имя в массиве
    		$myObj->name[] = $n; // добавляю имя компании-перевозчика
        $myObj->phone[] = $p; // добавляю номер компании перевозчика
        $myJSON = json_encode($myObj); // конвертирую в JSON-формат для дальнейшего управления данными в скрипте script.js
    }
 }
print_r($myJSON); // вывожу на экран (но, на самом деле ещё нет) данные.

// Далее, обработка продолжается в файле /test_task_done/core/script.js

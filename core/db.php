<?php
$conn = mysqli_connect('localhost', 'root', '', 'testtask'); // подключаюсь к БД
mysqli_query($conn,"set names utf8"); // задаю кодировку utf-8 для корректного отображения кириллици
if(!$conn){ // проверка на неудачное подключение
    echo mysqli_error; // в случае чего будет объявлено об ошибке
}

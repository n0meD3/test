<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!--> Подключаю JQuery для скрипта <!-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">   <!--> Подключаю библиотеку Bootstrap для красоты <!-->
    <link rel="shortcut icon" href="/test_task_done/style/favicon.ico"> <!--> Подтягиваю иконку сайта<!-->
    <link rel="stylesheet" href="/test_task_done/style/style.css">  <!--> Подтягиваю стили сайта<!-->
    <title>Logistic</title>  <!--> Название(лого в шапке) сайта<!-->
  </head>
  <body>
    <h1>LOGISTICS SEARCH by n0meD Ⓒ huntERR_inc.</h1> <br>
    <script type="text/javascript"></script>
    <script src="/test_task_done/core/script.js" charset="utf-8"></script> <!--> Подтягиваю скрипт вывода данных<!-->

    <form action="" method="post" id="ajax_form">  <!--> Создаю форму для передачи данных файлу-обработчику<!-->
      <h5>Точка отправки<input name="start" type="text" placeholder="Введите zip-code" required/>  <!--> Поле ввода точки отправки<!-->
      Точка назначения<input name="finish" type="text" placeholder="Введите zip-code" required/>   <!--> Поле ввода точки назначения<!-->
      <input class="button" name="submit" type="submit" id="btn" value="Поиск" /></h5>  <!--> Кнопка подтверждения и отправки данных серверному скрипту для обработки<!-->
    </form> <!--> Закрытие формы<!-->
    <table border="1"> <!--> Создание таблицы для вывода данных <!-->
 <tr>
  <th>Название</th>
  <th>Номер</th>
  <th>View on map</th>
 </tr>
  <table border="1">
    <tr>
      <td><div name="result_name" id="result_name"></div></td>  <!--> Колонка для вывода имени<!-->
      <td><div name="result_phone" id="result_phone"></div></td>  <!--> Колонка для вывода номера<!-->
      <td><div name="result_link" id="result_link"></div></td>  <!--> Колонка для вывода ссылки<!-->
    </tr>
  </table>
    </table> <!--> Закрытие таблицы<!-->
  </body>
</html>


$( document ).ready(function() { 
    $("#btn").click(
    function(){ // фунция для очистки поля div, в который мы выводим всю информацию
      var name = document.getElementById("result_name"); // обращение к полю div с id-шником result_name
      name.innerHTML = ""; // очистка поля для вывода имени компании-перевозчика
      var phone = document.getElementById("result_phone"); // обращение к полю div с id-шником result_phone
      phone.innerHTML = ""; // очистка поля для вывода номера компании-перевозчика
      var link = document.getElementById("result_link"); // обращение к полю div с id-шником result_link
      link.innerHTML = ""; // очистка поля для вывода ссылки на маршрут в Google Maps
      sendAjaxForm('result_form', 'ajax_form', 'core.php'); // отправка запроса в наш основной файл-обработчик
      return false;
    }
  );
});

function sendAjaxForm(result_form, ajax_form, url) { // функция отправки данных в наш файл-обработчик
    $.ajax({
        url:     "/test_task_done/core/core.php", //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response); // распарсим полученные данные

            var name = document.getElementById("result_name"); // получение поля для переменной имени компании-перевозчика
            result.name.forEach(e => name.innerHTML += "<p>" + e + "</p>"); // перебор циклом foreach, на случай, если будет не одно имя

            var phone = document.getElementById("result_phone"); // получение поля для переменной номера компании-перевозчика
            result.phone.forEach(e => phone.innerHTML += "<p>" + e + "</p>"); // перебор циклом foreach, на случай, если будет не однин номер

            var link = document.getElementById("result_link"); // получение переменной имени компании-перевозчика
            result.link.forEach(e => link.innerHTML += "<a href='"+e+"' target='_blank'>Open map</a>"); // уже на момент написания коментариев заметил, что тут цикл то не нужен, т.к. ф файле core.php я специально ссылку оставил в единичном экземпляре
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.'); // ошибка получения данных
        }
    });
}

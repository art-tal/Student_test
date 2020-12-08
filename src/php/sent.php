<?php
/* Здесь мы проверяем существуют ли переменные, которые передала форма обратной связи. Если не существуют, то мы их создаем */
//if (isset($_POST['data'])) {$data = $_POST['data'];}
// DEBUG
$data = "Test's Data";
//$data = json_decode($_GET['data']);


/* Здесь необходимо вписать ваш e-mail адрес */
$sender = "talanov_artem@ukr.net";
$recipient = "talanov_artem@ukr.net";

/* Здесь вписываете тему, которая будет отображаться в теме письма */
$sub = "Тестовое задание $data.student.name";

/*А здесь прописываете сам текст сообщения, который будет Вам отправлен. Если Вам необходимо начать новую строку необходимо поставить \n */
$mes = "\nТест заполнен! Поулчите/распишитесь... \n\nДанные теста: \n$data";

/* А это функция, как раз занимается отправкой письма на указанный выше адрес */
{
//    $send = mail ($recipient,$sub,$mes,"Content-type:text/plain; charset = windows-1251\r\nFrom:$sender");
    $send = mail ($recipient,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$sender");
    if ($send == 'true')
    {
        echo ('<p style="color: green">Send message!</p>');
        $_POST['name'] = $_POST['email'] = $_POST['message'] = '';
    }
    else
    {
        echo ('<p style="color: red">Error!</p>');
        $_POST['name'] = $_POST['email'] = $_POST['message'] = '';
    }
}
?>

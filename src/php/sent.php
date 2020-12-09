<?php
/* Здесь мы проверяем существуют ли переменные, которые передала форма обратной связи. Если не существуют, то мы их создаем */
//if (isset($_POST['data'])) {$data = $_POST['data'];}
// DEBUG
//$data = "Test's Data";

//$data = $_POST['data'];
//echo ($data);
//$student = $data -> student;
//$studentMail = $data -> studentMail;
//$timeStart = $data -> timeStart;
//$timeEnd = $data -> timeEnd;
//$timer = $data -> timer;
//$test = json_decode($data -> test);

//$student = $_POST['student'];
//$studentMail = $_POST['studentMail'];
//$timeStart = $_POST['timeStart'];
//$timeEnd = $_POST['timeEnd'];
//$timer = $_POST['timer'];
//$test = json_decode($_POST['test']);

if (isset($_POST['student'])) {$student = $_POST['student'];}
else {$student = "НИХЕРА";}

if (isset($_POST['studentMail'])) {$studentMail = $_POST['studentMail'];}
else {$studentMail = "НИХЕРА studentMail";}

if (isset($_POST['timeStart'])) {$timeStart = $_POST['timeStart'];}
else {$timeStart = "НИХЕРА timeStart";}

if (isset($_POST['timeEnd'])) {$timeEnd = $_POST['timeEnd'];}
else {$timeEnd = "НИХЕРА timeEnd";}

if (isset($_POST['timer'])) {$timer = $_POST['timer'];}
else {$timer = "НИХЕРА timer";}

//if (isset($_POST['test'])) {$student = json_decode($_POST['test']);}
//else {$test = "НИХЕРА test";}



/* Здесь необходимо вписать ваш e-mail адрес */
$sender = "talanov_artem@ukr.net";
$recipient = "talanov_artem@ukr.net";

$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset: utf8\r\n";

/* Здесь вписываете тему, которая будет отображаться в теме письма */
$sub = "Тестовое задание $student";

/*А здесь прописываете сам текст сообщения, который будет Вам отправлен. Если Вам необходимо начать новую строку необходимо поставить \n */
$mes = "<html lang='en'>
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                <title>NUOS</title>
                <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
            </head>
            <body>
                <h1>Тестовое задание {$student}</h1>
                <h2>$studentMail</h2>
                <h3>Тест начат: $timeStart</h3>
                <h3>Ответы студента $student на вопросы:</h3>
                <div>
                    foreach ($test as $answer) {<p>$answer</p>}
                </div>
                <h3>Тест окончен: $timeEnd</h3>
                <h4>Затраченое время: $timer</h4>                
            </body>
        </html>
";

/* А это функция, как раз занимается отправкой письма на указанный выше адрес */
{
//    $send = mail ($recipient,$sub,$mes,"Content-type:text/plain; charset = windows-1251\r\nFrom:$sender");
    $send = mail ($recipient,$sub,$mes,"Content-type:text/html; charset = utf-8\r\nFrom:$sender");
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

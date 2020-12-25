<?php
/* Здесь мы проверяем существуют ли переменные, которые передала форма обратной связи. Если не существуют, то мы их создаем */

if (isset($_POST['studentTest'])) {$studentTest = json_decode($_POST['studentTest']);}
else {$studentTest = "НИХЕРА";}

/* Здесь необходимо вписать ваш e-mail адрес */
$sender = "galyafed7@gmail.com";
$recipient = "galyafed7@gmail.com";

$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset: utf8\r\n";

/* Здесь вписываете тему, которая будет отображаться в теме письма */
$sub = "Тестовое задание $studentTest->student";

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
                <h1>Тестовое задание $studentTest->student</h1>
                <h2>$studentTest->eMail</h2>
                <h3>Тест начат: $studentTest->timeStart</h3>
                <h3>Всего дано ответов: $studentTest->count</h3>
                <h3>Ответы студента $studentTest->student на вопросы:</h3>
                    <ul>";

foreach($studentTest->test as $value) {
    $mes .="<li>".$value."</li>";
};

$mes .="</ul>                    
                <h3>Тест окончен: $studentTest->timeEnd</h3>
                <h4>Затраченое время: $studentTest->timer</h4>                
            </body>
        </html>
";

/* А это функция, как раз занимается отправкой письма на указанный выше адрес */
{
    $send = mail ($recipient,$sub,$mes,"Content-type:text/html; charset = utf-8\r\nFrom:$sender");

}

?>

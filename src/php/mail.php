<meta http-equiv='refresh' content='10; url=http://edorenko.nuos.com.ua/'>
<meta charset="UTF-8" />

<?php
// *** SMTP *** //

require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/phpmailer/smtp.php');
const HOST = 'ssl://smtp.yandex.ru';
const LOGIN = 'sender@yandex.ru';
const PASS = 'senderPass';
const PORT = '465';

// *** /SMTP *** //

// Почта с которой будет приходить письмо
const SENDER = 'sender@yandex.ru';

// Почта на которую будет приходить письмо
const CATCHER = 'catcher@mail.ru';

// Тема письма
const SUBJECT = 'Заявка с сайта';

// Кодировка
const CHARSET = 'UTF-8';

?>
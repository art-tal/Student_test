<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NUOS</title>
    <link rel="shortcut icon" href="src/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="src/style/css/font.css">
    <link rel="stylesheet" href="src/style/css/main.css">
</head>
<body>
    <header>
        <div class="row">
            <div class="logo">
                <img src="src/img/logo.png" alt="logo">
                <h2>НАЦІОНАЛЬНИЙ УНІВЕРСИТЕТ <br> КОРАБЛЕБУДУВАННЯ <br> ІМЕНІ АДМІРАЛА МАКАРОВА</h2>
            </div>
        </div>
        <section class="sub_header">
            <h1>Экономика предприятия</h1>
            <h2>Федоренко Галина Михайловна</h2>
            <p>На данной странице реализована возможность пройти тестирование по предмету "Экономика предприятия". На прохождение теста отведено 90 минут с момента загрузки страницы с вопросами теста. Тест пройти можно только один раз. Для того чтобы приступить к тестированию необходимо ввести ваши регистрационные данные и нажать кнопку "Start the test", после чего откроется страница с тестами. После того как Вы закончите тест необходимо нажать кнопку "Send test" для отправки его на проверку преподавателю. <span style="color: red; font-size: 1.8rem;">По окончанию 90 минут ваш тест будет автоматически отправлен на проверку даже если вы его не окончили.</span></p>
        </section>
    </header>

    <main>

        <?php include_once ("src/sections/registration.php") ?>

        <?php include_once ("src/sections/student_test.php") ?>

        <?php include_once ("src/sections/testDone.php") ?>
    </main>

    <footer>
        <div class="logo">
            <img src="src/img/logo.png" alt="logo">
            <h2>НАЦІОНАЛЬНИЙ УНІВЕРСИТЕТ <br> КОРАБЛЕБУДУВАННЯ <br> ІМЕНІ АДМІРАЛА МАКАРОВА</h2>
        </div>

        <div class="wrap">
            <h3>Предмет: Экономика предприятия</h3>
            <h3>Преподаватель: Федоренко Галина Михайловна</h3>
            <h4>galyafed7@gmail.com</h4>
        </div>

        <div class="wrap">
            <p>&#xA9; Національний університет кораблебудування, 2020</p>

        </div>


    </footer>

    <script src="src/libs/jQuery3.5.1.min.js"></script>
    <script src="src/js/main.js"></script>
</body>
</html>


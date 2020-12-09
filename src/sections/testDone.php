<? if ($_GET['status'] == 'success') { ?>
    <div class="done">
        <div class="done__wrap">
            <h1 class="Done__title">Your work has been sent to the teacher</h1>
            <h3 class="done__descriptor">Test results will be announced later</h3>
            <a class="done__button" href="/">Good luck</a>
        </div>
    </div>
<? } else {
    header ("Location: /"); // главная страница вашего лендинга
} ?>
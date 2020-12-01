<section class="registration active">
    <form action="" name="registration">
        <div class="row">
            <label for="name">Enter Your name</label>
            <input id="name" type="text" placeholder="Name">
            <span class="empty">required field</span>
<!--            поле обязательное для заполнения-->
            <span class="error">uppercase and lowercase characters of the English alphabet are allowed for input</span>
<!--            для ввода допускаются прописные и строчные символы английского алфавита-->
        </div>

        <div class="row">
            <label for="lastName">Enter Your last name</label>
            <input id="lastName" type="text" placeholder="Last Name">
            <span class="empty">required field</span>
            <!--            поле обязательное для заполнения-->
            <span class="error">uppercase and lowercase characters of the English alphabet are allowed for input</span>
            <!--            для ввода допускаются прописные и строчные символы английского алфавита-->
        </div>

        <div class="row">
            <label for="eMail">Enter Your e-mail</label>
            <input id="eMail" type="email" placeholder="E-mail">
            <span class="empty">required field</span>
            <!--            поле обязательное для заполнения-->
            <span class="error">invalid email format</span>
            <!--            неверный формат электронного адресва-->
        </div>

        <button id="registration" type="button">Start the test</button>
    </form>
</section>

<section class="registration">
    <form id="formRegistration" action="" name="registration">
        <div class="row">
            <label for="name">Enter Your name</label>
            <input id="name" type="text" placeholder="Name">
            <span class="empty">Required field</span>
<!--            поле обязательное для заполнения-->
            <span class="error">Uppercase and lowercase characters of the English alphabet are allowed for input</span>
<!--            для ввода допускаются прописные и строчные символы английского алфавита-->
        </div>

        <div class="row">
            <label for="lastName">Enter Your last name</label>
            <input id="lastName" type="text" placeholder="Last Name">
            <span class="empty">Required field</span>
            <!--            поле обязательное для заполнения-->
            <span class="error">Uppercase and lowercase characters of the English alphabet are allowed for input</span>
            <!--            для ввода допускаются прописные и строчные символы английского алфавита-->
        </div>

        <div class="row">
            <label for="eMail">Enter Your e-mail</label>
            <input id="eMail" type="email" placeholder="E-mail">
            <span class="empty">Required field</span>
            <!--            поле обязательное для заполнения-->
            <span class="error">Invalid email format</span>
            <!--            неверный формат электронного адресва-->
        </div>

        <button id="registration" type="button">Start the test</button>
        <span class="error">Check the correctness of filling in the fields</span>
    </form>
</section>

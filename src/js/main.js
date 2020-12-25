let student = {
    name: "",
    lastName: "",
    eMail: ""
};

let templName = /[A-Z][a-z]+/;
let templMail = /[a-z]+[.\w]+@[a-z]+\.[a-z]+/i;

let validName = false;
let validLastName = false;
let validEmail = false;

let test = {};

const studentTest = {};

let startTest = '';

let time;

let deathLine = 90;

let timeTest = {
    minutes: 0,
    seconds: 0,
};


$(document).ready(function () {


$('#name').on('blur', () => {
    let name = $('#name')
    // student.name = $('#name').val();
    student.name = name.val();
    // if ( checkValid( $('#name'), templName) ) {
    validName = checkValid(name, templName);
});

$('#lastName').on('blur', () => {
    student.lastName = $('#lastName').val();
    // checkValid($('#lastName'));
    if ( checkValid( $('#lastName'), templName) ) {
        validLastName = true;
    } else {
        validLastName = false;
    }
});

$('#eMail').on('blur', () => {
    let email = $('#eMail');
    // student.eMail = $('#eMail').val();
    student.eMail = email.val();
    // if ( checkValid( $('#eMail'), templMail) ) {
    validEmail = checkValid(email, templMail);
});

$('#registration').on('click', () => {
    if (student.name && student.lastName && student.eMail) {
        if ( validName && validLastName && validEmail ){
            $('.registration').toggleClass('disable');
            $('.test').toggleClass('disable');
            rememberUser();
            startTest = new Date();
            timer();
            $('#formRegistration').trigger('reset');
            isThereTest();
        } else {
            $('.registration').next(".error").css('display', 'block');
            setTimeout( () => {
                $('.registration').next(".error").css('display', 'none');
            }, 4000 )
        }
    }
});

$("input[type='radio']").on('change', function() {
    let obj = $(this);
    test[obj.attr("name")] = obj.attr("id") + " => " + obj.val();
    localStorage.test = JSON.stringify(test);
});

$("#submit").on("click", function (event) {
    event.preventDefault();
    sendTest();
})



function checkValid(obj, templ) {
    let str = $(obj).val();
    if (!str) {
        $(obj).next(".empty").css('display', 'block');
        $(obj).nextAll(".error").css('display', 'none');
        return false;
    }
    if (templ.test(str)) {
        $(obj).nextAll(".error").css('display', 'none');
        $(obj).next(".empty").css('display', 'none');
        return true;
    } else {
        $(obj).next(".empty").css('display', 'none');
        $(obj).nextAll(".error").css('display', 'block');
        return false;
    }

}

function rememberUser() {
    localStorage.student = JSON.stringify(student);
    $("#student").text(`${student.lastName} ${student.name}`);
    $("#studentEmail").text(student.eMail);

}

function timer() {
    let clock = $("#timer");
    let radio = $('input[type="radio"]');
    try {
        if (JSON.parse( localStorage.timeTest )) {
            timeTest = JSON.parse( localStorage.timeTest );
            if (timeTest.minutes === deathLine) {
                clock.text(`${format(timeTest.minutes)}:${format(timeTest.seconds)}`);
                clock.css("color", "red");
                timerStop();
                doneTest();
                return;
            }
        }
    } catch (e) {
        localStorage.timeTest = JSON.stringify(timeTest);
    }

    time = setInterval(() => {
    if (timeTest.seconds === 59) {
        timeTest.seconds = 0;
        ++timeTest.minutes;
    } else {
        ++timeTest.seconds;
    }
    localStorage.timeTest = JSON.stringify(timeTest);
    clock.text(`${format(timeTest.minutes)}:${format(timeTest.seconds)}`);
    switch (timeTest.minutes) {
        case 75:
            clock.css("color", "red");
            break;
        case deathLine:
            radio.attr("disable", "disable");
            radio.off();
            clearInterval(time);
            sendTest();
            break;
    }
},1000);
}

function format(count) {
    if (count < 10) {
        return `0${count}`;
    } else {
        return count;
    }
}

function isThereTest() {
    try {
        if (JSON.parse(localStorage.test)) {
            test = JSON.parse(localStorage.test);
            for (let key in test) {
                $(`#${key}`).attr('checked', "checked");
            }
        }
    } catch (e) {
        console.log("test is empty");
    }

}

function countAnswers(test) {
    return Object.keys(test).length;
}

function sendTest() {
    studentTest.student = student.name + " " + student.lastName;
    studentTest.eMail = student.eMail;
    studentTest.timeStart = startTest;
    studentTest.timeEnd = new Date();
    studentTest.timer = timeTest.minutes + ":" + timeTest.seconds;
    studentTest.count = countAnswers(test);
    studentTest.test = test;
    $.post(
        "./src/php/mail.php",
        {
            "studentTest": JSON.stringify(studentTest),
        }
    )
        .done( () => {
            timerStop();
            doneTest();
        } )
        .fail( () => {
            console.log("error");
            $(".done__success").hide();
            $(".done__error").show();
            $(".done").fadeIn(500);
            clearInterval(time);
            setTimeout( () => {
                $(".done").fadeOut(500);
                timer();
            }, 5000 );
        } )
}

function doneTest() {
    $(".done__success").show();
    $(".done__error").hide();
    $(".done").fadeIn(500);
    $(".test").fadeOut();
    test = null;
    localStorage.test = 0;
}

function timerStop() {
    clearInterval(time);
    timeTest.minutes = deathLine;
    timeTest.seconds = "0"
    localStorage.timeTest = JSON.stringify(timeTest);

}



});
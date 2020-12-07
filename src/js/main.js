const student = {
    name: "",
    lastName: "",
    eMail: ""
};

let templName = /[A-Z][a-z]+/;
let templMail = /[a-z]+[.\w]+@[a-z]+\.[a-z]+/;

let validName = false;
let validLastName = false;
let validEmail = false;

const test = {};

const studentTest = {
    student: student,
    test: test
};

let startTest = '';
let finishTest = '';
let timeTest = {
    minutes: 0,
    seconds: 0,
};


$('#name').on('blur', () => {
    student.name = $('#name').val();
    // checkValid($('#name'));
    if ( checkValid( $('#name'), templName) ) {
        validName = true;
    } else {
        validName = false;
    }

    console.log(student.name);
});

$('#lastName').on('blur', () => {
    student.lastName = $('#lastName').val();
    // checkValid($('#lastName'));
    if ( checkValid( $('#lastName'), templName) ) {
        validLastName = true;
    } else {
        validLastName = false;
    }

    console.log(student.lastName);
});

$('#eMail').on('blur', () => {
    student.eMail = $('#eMail').val();
    // checkMail($('#eMail'));
    if ( checkValid( $('#eMail'), templMail) ) {
        validEmail = true;
    } else {
        validEmail = false;
    }

    console.log(student.eMail);
});


$('#registration').on('click', () => {
    if (student.name && student.lastName && student.eMail) {
        if ( validName && validLastName && validEmail ){
            $('.registration').toggleClass('disable');
            $('.test').toggleClass('disable');
            rememberUser();
            startTest = new Date();
            console.log("start");
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
    console.log(obj.val());
    console.log(obj.attr("id"));
    test[obj.attr("id")] = obj.val();
    localStorage.test = JSON.stringify(test);
});

function checkValid(obj, templ) {
    console.log(1);
    console.log(obj);
    let str = $(obj).val();
    console.log(str);

    // let templName = /[A-Z][a-z]+/;////////////////////////
    if (!str) {
        $(obj).next(".empty").css('display', 'block');
        $(obj).nextAll(".error").css('display', 'none');
        console.log("empty");
        return false;
    }
    if (templ.test(str)) {//////////////
        $(obj).nextAll(".error").css('display', 'none');
        $(obj).next(".empty").css('display', 'none');
        console.log("check");
        return true;
    } else {
        $(obj).next(".empty").css('display', 'none');
        $(obj).nextAll(".error").css('display', 'block');
        console.log("not check");
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
        }
    } catch (e) {
        localStorage.timeTest = JSON.stringify(timeTest);
    }


let time = setInterval(() => {
    if (timeTest.seconds === 59) {
        timeTest.seconds = 0;
        ++timeTest.minutes;
    } else {
        ++timeTest.seconds;
    }
    localStorage.timeTest = JSON.stringify(timeTest);
    clock.text(`${format(timeTest.minutes)}:${format(timeTest.seconds)}`);
    // $("#timer").text(`${format(timeTest.minutes)}:${format(timeTest.seconds)}`);
    switch (timeTest.minutes) {
        case 75:
            // $("#timer").css("color", "red");
            clock.css("color", "red");
            break;
        case 80:
            // $('input[type="radio"]').attr("disable");
            radio.attr("disable", "disable");
            // $('input[type="radio"]').off();
            radio.off();
            clearInterval(time);
            sendTest();
            localStorage.timeTest = 0;

            break;
    }
    // console.log(timeTest);

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
    let testInStorage = JSON.parse(localStorage.test);
    console.log(testInStorage);
    if (testInStorage) {
        for (let key in testInStorage) {
            console.log(`#${key}`);
            $(`#${key}`).attr('checked', "checked");
        }
    }
}

function sendTest() {
    finishTest = new Date();
}


$(document).ready(function () {

});
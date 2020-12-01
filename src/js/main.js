const student = {
    name: "",
    lastName: "",
    eMail: ""
};

const test = new Map();

const studentTest = {
    student: student,
    test: test
};

let minutes = 0;
let seconds = 0;

$('#name').on('blur', () => {
    student.name = $('#name').val();
    checkName($('#name'));
    console.log(student.name);
});

$('#lastName').on('blur', () => {
    student.lastName = $('#lastName').val();
    checkName($('#lastName'));
    console.log(student.lastName);
});

$('#eMail').on('blur', () => {
    student.eMail = $('#eMail').val();
    checkMail($('#eMail'))
    console.log(student.eMail);
});


$('#registration').on('click', () => {
    if (student.name && student.lastName && student.eMail) {
        $('.registration').toggleClass('disable');
        $('.test').toggleClass('disable');
    }
});

function checkName(obj) {
    console.log(1);
    console.log(obj);
    let str = $(obj).val();
    console.log(str);

    let templName = /[A-Z][a-z]+/;
    if (!str) {
        $(obj).next(".empty").css('display', 'block');
        $(obj).nextAll(".error").css('display', 'none');
        console.log("empty");
        return false;
    }
    if (templName.test(str)) {
        $(obj).nextAll(".error").css('display', 'none');
        $(obj).next(".empty").css('display', 'none');
        console.log("check");
        return true;
    } else {
        $(obj).nextAll(".error").css('display', 'block');
        console.log("not check");
        return false;
    }

}

function checkMail(obj) {
    console.log(1);
    console.log(obj);
    let str = $(obj).val();
    console.log(str);

    let templMail = /[a-z]+[.\w]+@[a-z]+\.[a-z]+/;
    if (!str) {
        $(obj).next(".empty").css('display', 'block');
        $(obj).nextAll(".error").css('display', 'none');
        console.log("empty");
        return false;
    }
    if (templMail.test(str)) {
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

function timer() {
let time = setInterval(() => {
    if (seconds === 59) {
        seconds = 0;
        ++minutes;
    } else {
        ++seconds;
    }
    $("#timer").text(`${format(minutes)}:${format(seconds)}`);
    switch (minutes) {
        case 75:
            $("#timer").css("color", "red");
            break;
        case 1:
            flashing();
            break;
        case 80:
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

function flashing() { //don`t work
        // setInterval( () => {
        //     $("#timer > span").toggleClass('disable');
        // },500);
}

function sendTest() {}

$(document).ready(function () {
    timer();
});
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
        case 79:
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

function flashing() {
        // setInterval( () => {
        //     $("#timer > span").toggleClass('disactive');
        // },500);
}

function sendTest() {}

$(document).ready(function () {
    timer();
});
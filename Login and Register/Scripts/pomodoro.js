const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('.navbar');
const navbg = document.querySelector('.nav-bg');
menuIcon.addEventListener('click', () => {
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active');
  navbg.classList.toggle('active');
});


let pomodoro = document.getElementById("pomodoro-timer");
let short = document.getElementById("short-timer");
let long = document.getElementById("long-timer");
let currentTimer = null;
let myInterval = null;
let timeRemaining = 0; // Tiempo restante en milisegundos

function showDefaultTimer() {
    pomodoro.style.display = "block";
    short.style.display = "none";
    long.style.display = "none";
}

showDefaultTimer();

function hideAll() {
    let timers = document.querySelectorAll(".timer-display");
    timers.forEach((timer) => (timer.style.display = "none"));
}

document
    .getElementById("pomodoro-session")
    .addEventListener("click", function () {
        hideAll();
        pomodoro.style.display = "block";
        currentTimer = pomodoro;
        timeRemaining = parseInt(pomodoro.getAttribute("data-duration")) * 60 * 1000; // Reinicia tiempo restante
    });

document
    .getElementById("short-break")
    .addEventListener("click", function () {
        hideAll();
        short.style.display = "block";
        currentTimer = short;
        timeRemaining = parseInt(short.getAttribute("data-duration")) * 60 * 1000; // Reinicia tiempo restante
    });

document
    .getElementById("long-break")
    .addEventListener("click", function () {
        hideAll();
        long.style.display = "block";
        currentTimer = long;
        timeRemaining = parseInt(long.getAttribute("data-duration")) * 60 * 1000; // Reinicia tiempo restante
    });

function startTimer(timerdisplay) {
    if (myInterval) {
        clearInterval(myInterval);
    }

    // Si no hay tiempo restante, toma el tiempo desde el atributo "data-duration"
    if (timeRemaining <= 0) {
        let timerDuration = timerdisplay.getAttribute("data-duration").split(":")[0];
        timeRemaining = timerDuration * 60 * 1000;
    }

    let endTimestamp = Date.now() + timeRemaining;

    myInterval = setInterval(function () {
        timeRemaining = endTimestamp - Date.now();

        if (timeRemaining <= 0) {
            clearInterval(myInterval);
            timerdisplay.textContent = "00:00";
            timeRemaining = 0; // Reiniciar tiempo restante
            const alarm = new Audio("sound/alarm.wav");
            alarm.play();
        } else {
            const minutes = Math.floor(timeRemaining / 60000);
            const seconds = Math.floor((timeRemaining % 60000) / 1000);
            const formattedTime = `${minutes}:${seconds.toString().padStart(2, "0")}`;
            timerdisplay.textContent = formattedTime;
        }
    }, 1000);
}

document.getElementById("start").addEventListener("click", function () {
    if (currentTimer) {
        startTimer(currentTimer);
        document.getElementById("timer-message").style.display = "none";
    } else {
        document.getElementById("timer-message").style.display = "block";
    }
});

document.getElementById("stop").addEventListener("click", function () {
    if (currentTimer && myInterval) {
        clearInterval(myInterval);
        myInterval = null; // Detener el intervalo
    }
});

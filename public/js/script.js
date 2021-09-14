let a;
let date;
let hours;
let minutes;
let seconds;
let time;
const options = {
    weekday: 'short',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
}

setInterval(() => {
    a = new Date();
    date = a.toLocaleDateString(undefined, options);

    hours = a.getHours();
    if (hours < 10) {
        hours = "0" + hours;
    }
    minutes = a.getMinutes();
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    seconds = a.getSeconds();
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    time = hours + ":" + minutes;
    document.getElementById("time").innerHTML = time;
    document.getElementById("seconds").innerHTML = seconds;
    document.getElementById("date").innerHTML = date;
}, 1000)
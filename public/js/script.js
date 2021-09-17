// let a;
// let date;
// let hours;
// let minutes;
// let seconds;
// let time;
// const options = {
//     weekday: 'short',
//     year: 'numeric',
//     month: 'long',
//     day: 'numeric'
// }

// setInterval(() => {
//     a = new Date();
//     date = a.toLocaleDateString('nl-DU', options);

//     hours = a.getHours();
//     if (hours < 10) {
//         hours = "0" + hours;
//     }
//     minutes = a.getMinutes();
//     if (minutes < 10) {
//         minutes = "0" + minutes;
//     }
//     seconds = a.getSeconds();
//     if (seconds < 10) {
//         seconds = "0" + seconds;
//     }
//     time = hours + ":" + minutes;
//     document.getElementById("time").innerHTML = time;
//     document.getElementById("seconds").innerHTML = seconds;
//     document.getElementById("date").innerHTML = date;
// }, 1000);



const form = document.getElementById('suggestieformulier');
form.addEventListener('submit', function(e) {
    e.preventDefault();
    const suggestietitle = form.querySelector('textarea[name=suggestietitle]').value;
    const suggestie = form.querySelector('textarea[name=suggestie]').value;
    var formdata = new FormData();
    formdata.append('suggestietitle', suggestietitle);
    formdata.append('suggestie', suggestie);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", this.action);

    var metas = document.getElementsByTagName('meta');
    for (i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute("name") == "csrf-token") {
            ajax.setRequestHeader("X-CSRF-Token", metas[i].getAttribute("content"));
        }
    }
    ajax.send(formdata);
    // console.log(formdata);
})
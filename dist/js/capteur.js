var connected = document.getElementById("SESSION_CONNECTED").innerHTML;
console.log(connected)
if (connected == 0){
    var datas = document.getElementById("datas");
    datas.classList.add("hidden");
} else {
    var notConnected = document.getElementById("notConnected");
    notConnected.classList.add("hidden");
}
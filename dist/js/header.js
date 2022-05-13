var connected = document.getElementById("SESSION_CONNECTED").innerHTML;
console.log(connected)
if (connected == 0){
    var datas = document.getElementById("datas");
    datas.classList.add("hidden");
} 
if (connected == 1) {
    var notConnected = document.getElementById("notConnected");
    notConnected.classList.add("hidden");
} 

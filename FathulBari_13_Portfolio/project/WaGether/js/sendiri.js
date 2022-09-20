let input = document.querySelector(".kode");
let button = document.querySelector(".joinbtn");
button.disabled = true;
input.addEventListener("change", JoinButton);

function tanggalan() {
  var now = new Date();
  var jam = now.toLocaleTimeString("id-ID", { hour: "numeric", minute: "numeric" });
  var hari = now.getDay();
  var listhari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
  var tgl = now.getDate();
  var bln = now.getMonth();
  var listbln = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
  document.getElementById("hours").innerHTML = jam;
  document.getElementById("day").innerHTML = listhari[hari] + ",";
  document.getElementById("date").innerHTML = tgl;
  document.getElementById("month").innerHTML = listbln[bln];
}

setInterval(tanggalan, 1000);

function JoinButton() {
  if (document.querySelector(".kode").value.length != 10) {
    button.disabled = true;
    document.getElementById("joinbtn").style.color = "white";
    document.getElementById("joinbtn").style.border = "none";
    document.getElementById("joinbtn").style.backgroundColor = "white";
  } else if (document.querySelector(".kode").value.length == 10) {
    button.disabled = false;
    document.getElementById("joinbtn").style.color = "white";
    document.getElementById("joinbtn").style.backgroundColor = "#1A73E8";
  }
}

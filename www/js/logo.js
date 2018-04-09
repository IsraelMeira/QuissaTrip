var modal = document.getElementById('myModal');
var intervalo = window.setInterval(function() {
    modal.style.display = "block";
}, 50);
window.setTimeout(function() {
    clearInterval(intervalo);
    modal.style.display = "none";
}, 3000);
window.onload = initPage;
function intervalo(){
}
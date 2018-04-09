var modal = document.getElementById('myModal');
var bool = window.sessionStorage.getItem('opened');
var intervalo = window.setInterval(function() {
	if (bool != 'off') {
    	modal.style.display = "block";
    }
}, 50);
window.setTimeout(function() {
    clearInterval(intervalo);
    modal.style.display = "none";
    window.sessionStorage.setItem('opened', 'off');
}, 3000);
function intervalo(){
}
document.addEventListener('deviceready', onDeviceReady, false);

function onDeviceReady() {
  $("#formLogin").submit(function (e){
    e.preventDefault();
 
    $.ajax({
      type: "POST",
      url: "http://localhost/QuissaTrip/www/PHP/Login.php", 
      data: {
        acao: 'LoginWeb',
        usuario: $("#login").val(),
        senha: $("#senha").val()
      },            
      async: false,
      dataType: "json", 
      success: function (json) {
 
      if(json.result == true){
        //redireciona o usuario para pagina
        $("#usuario_nome").html(json.dados.nome);
 
        $.mobile.changePage("#index", {
          transition : "slidefade"
        });
 
      }else{
        alert(json.msg);
      }
    },error: function(xhr,e,t){
      console.log(xhr.responseText);                
    }
  });
});
}
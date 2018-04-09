<!DOCTYPE html>
  <html>
  <head lang="en">
      <meta charset="UTF-8">
      <title>Armazenando imagens no banco de dados Mysql</title>
  </head>
  <body>
  <h2>Selecione um novo arquivo de imagem</h2>
   
  <form enctype="multipart/form-data" action="upload.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
      <div><input name="imagem" type="file"/></div>
      <div><input type="submit" value="Salvar"/></div>
  </form>
  </body>
  </html>
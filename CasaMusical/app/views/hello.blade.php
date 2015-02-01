<!DOCTYPE html>
<html lang="es">
  <head>    
    <title>CasaMusical</title>
  </head>

  <body>    
  {{Form::open(array('route'=>'newProduct','method'=>'POST'))}}
      <input name="product" type="text"/>  
      <input name="model" type="text"/>  
      <input name="price" type="text"/>  
      <input name="gain" type="text"/>  
      <input name="price_iva" type="text"/>  
      <input name="reserve" type="text"/>  
      <input name="reorderpoint" type="text"/>  
      <input type="submit" value="Enviar" />      
  {{Form::close()}}  
  </body>
</html>

<?php 
class Conexion
{
    var $conexion;  
    var $error;

    function Conectar()
    {
      try
      {
    $this->conexion = new PDO('mysql:host=localhost:33065;dbname=16bits','Brayan','78958456');
        
      } catch (PDOException $e)
      {
         $this->error = $e->getMessage();
      }
        return $this->conexion;
    }
 
}

?>
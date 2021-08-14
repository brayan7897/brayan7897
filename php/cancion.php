<?php
	require_once 'conexion.php';
	date_default_timezone_set("America/Lima");
	
	class cancion 
	{
		var $nombre;
		var $lista;
		var $size;

		public function getNombre(){ return $this->nombre; }
		public function setNombre($nombre){ $this->nombre = $nombre; }

	    public function getLista(){ return $this->lista; }
	 	public function setLista($lista){ $this->lista = $lista; }
		
		public function getsize(){ return $this->size; }
	 	public function setsize($size){ $this->size = $size; }

		public function __construct($nombre, $lista, $size){
			$this->nombre=$nombre;
			$this->lista=$lista;
			$this->size=$size;
		}

		public function crearCancion($nombre, $lista, $size)
		{
			$con = new Conexion();
			$con->Conectar();
			
			$codigo= generarCodigom();
			$this->nombre=$nombre;
			$this->lista=$lista;
			$this->size=$size;
		
    		try {
    			 $consulta=$con->conexion->prepare("INSERT INTO musica (codigo_musica, codigo_lista, nombre_musica, size_musica) VALUES(:codigo, :lista, :nombre, :size)");
	         
				 $consulta->bindvalue(':codigo', $codigo);
				 $consulta->bindValue(':lista', $this->lista);
				 $consulta->bindValue(':nombre', $this->nombre);
				 $consulta->bindValue(':size', $this->size);
	         	 $consulta->execute();

      	   return true; 
    			
    		} catch (Exception $e) {
    			echo $e;
    		}
	    	
		}	
		public function eliminarCancion($codigo)
		{
			$con = new Conexion();
			$con->Conectar();

			$this->codigo=$codigo;
		
    		try {
    			 $consulta=$con->conexion->prepare("DELETE FROM musica WHERE codigo_musica = $this->codigo");
	             $consulta->execute();

      	   		return true;
    			
    		} catch (Exception $e) {
    			echo $e;
    		}
		}
		public static function CancionesPorLista($lista)
		{
			$conexion = new Conexion();
		 	$conexion->Conectar();

			$consulta = $conexion->conexion->prepare("SELECT codigo_musica, musica.codigo_lista, nombre_musica,  size_musica FROM musica, lista WHERE musica.codigo_lista = '$lista' AND lista.codigo_lista = '$lista'");
		 	$consulta->execute();	  
			$rows = $consulta->fetchAll(\PDO::FETCH_OBJ);
									
            echo json_encode($rows);
		}
	}

	function generarCodigom(){
		$Acodigo = date("y").date("m").date("H").rand(10,99);
		$codigo =(int)$Acodigo;
		return $codigo;
	}
?>
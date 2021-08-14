<?php
	require_once 'conexion.php';
	
	class lista
	{
		var $codigo;
		var $nombre;

		public function getNombre(){return $this->nombre;}
		public function setNombre($nombre){ $this->nombre = $nombre; }

		public function getCodigo(){return $this->codigo;}
		public function setCodigo($codigo){ $this->codigo = $codigo; }

		public function __construct($codigo, $nombre)
		{	
			$this->codigo=$codigo;
			$this->nombre=$nombre;
		}
		public function crearLista($nombre)
		{
			$con = new Conexion();
			$con->Conectar();
			$codigo = generarCodigol();

			$this->nombre=$nombre;		
			
			$query="INSERT INTO lista (codigo_lista, nombre_lista) VALUES(:codigo, :nombre)";
	    	$consulta=$con->conexion->prepare($query);
	        $consulta->bindValue(':codigo', $codigo);	
	        $consulta->bindValue(':nombre', $this->nombre);	
	        $consulta->execute();

			generarArticulo1($codigo, $nombre);

	  	   return true;
		}
		public static function ActualizarLista($codigo, $nombre)
		{
			$conexion = new Conexion();
		 	$conexion->Conectar();
	
		    $consulta = $conexion->conexion->prepare("UPDATE lista SET nombre_lista='$nombre' WHERE codigo_lista = '$codigo' ");
		 	if($consulta->execute())
		 	{
		 		echo "1";
		 		return;
		 	}
		}
		public static function mostrarListas()
		{
			$conexion = new Conexion();
		 	$conexion->Conectar();
		    $consulta = $conexion->conexion->prepare("SELECT codigo_lista, nombre_lista FROM lista");
		 	$consulta->execute();

			$rows = $consulta->fetchAll(\PDO::FETCH_OBJ);
			echo json_encode($rows);
		}
		public static function mostrarDetallesListas()
		{
			$conexion = new Conexion();
			$conexion->Conectar();
			$sql="SELECT lista.codigo_lista, lis_nombre, (select count(*)  FROM cancion where cancion.codigo_lista = lista.codigo_lista And lista.codigo_lista = cancion.codigo_lista)  AS cantcanciones  FROM lista Group by  lista.lista_nombre";

		    $consulta = $conexion->conexion->prepare($sql);
		 	$consulta->execute();

	        $lista = $consulta->fetchAll(\PDO::FETCH_OBJ);   
	        echo json_encode($lista);
		}
	}

	function generarCodigol(){
		$Acodigo = date("y").date("m").date("s");
		$codigo =(int)$Acodigo;
		return $codigo;
	}
?>

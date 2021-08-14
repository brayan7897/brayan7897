<?php 
    require_once "conexion.php";

    class merch
	{
		var $nombre;
		var $descri;
		var $precio;
		var $img;

		public function getNombre(){return $this->nombre;}
		public function setNombre($nombre){ $this->nombre = $nombre; }

		public function getPrecio(){return $this->precio;}
		public function setPrecio($precio){ $this->precio = $precio; }

		public function getImg(){return $this->img;}
		public function setImg($img){ $this->img = $img; }

		public function getDescri(){return $this->descri;}
		public function setDescri($descri){ $this->descri = $descri; }

		public function __construct($nombre, $precio, $descri, $img)
		{
			$this->nombre=$nombre;
			$this->precio=$precio;
			$this->descri=$descri;
			$this->img=$img;
		}
		public function crearMerch($nombre, $precio, $descri, $img){

			$con = new Conexion();
			$con->Conectar();
			
			$codigo = generarCodigoa();
			$this->nombre=$nombre;	
			$this->precio=$precio;
			$this->descri=$descri;
			$this->img=$img;

			try{
				$query="INSERT INTO merch (codigo_merch, nombre_merch, descripcion_merch, precio, img) VALUES(:codigo, :nombre, :descri, :precio, :img)";
	    		$consulta=$con->conexion->prepare($query);
	        	$consulta->bindValue(':codigo', $codigo);
	        	$consulta->bindValue(':nombre', $this->nombre);
				$consulta->bindValue(':descri', $this->descri);
				$consulta->bindValue(':precio', $this->precio);
	        	$consulta->bindValue(':img', $this->img);
	        	$consulta->execute();

				return true; 
    			
    		} catch (Exception $e) {
    			echo $e;
    		}

			generarArticulo($codigo,$nombre,$precio);

		}
		public function mostarMerch(){

			$conexion = new Conexion();
		 	$conexion->Conectar();
		    $consulta = $conexion->conexion->prepare("SELECT * FROM merch");
		 	$consulta->execute();

			$rows = $consulta->fetchAll(\PDO::FETCH_OBJ);
			echo json_encode($rows);
		}
    }
	function generarCodigoa(){
		$Acodigo = date("y").date("s").rand(1000,9999);
		$codigo =(int)$Acodigo;
		return $codigo;
	}
?>
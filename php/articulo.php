<?php 
    require_once "conexion.php";

    class articulo
	{
        var $codigo;
		var $nombre;
		var $precio;
        var $tipo;

        public function getCodigo(){return $this->codigo;}
		public function setCodigo($nombre){ $this->nombre = $nombre; }

		public function getNombre(){return $this->nombre;}
		public function setNombre($nombre){ $this->nombre = $nombre; }

		public function getPrecio(){return $this->precio;}
		public function setPrecio($precio){ $this->precio = $precio; }

        public function getTipo(){return $this->tipo;}
		public function setTipo($tipo){ $this->tipo = $tipo; }

		public function __construct($codigo, $nombre, $precio, $tipo)
		{	
            $this->codigo=$codigo;
			$this->nombre=$nombre;
			$this->precio=$precio;
            $this->tipo=$tipo;
		}

		public function crearArticulo($codigo, $nombre, $precio, $tipo){

			$con = new Conexion();
			$con->Conectar();
			
			$this->nombre=$nombre;	
			$this->precio=$precio;
            $this->tipo=$tipo;
            
            try{
				$query="INSERT INTO articulo (codigo_arti, tipo_arti, nombre_arti, precio_arti) VALUES(:codigo, :tipo, :nombre, :precio)";
	    		$consulta=$con->conexion->prepare($query);
	        	$consulta->bindValue(':codigo', $codigo);
	        	$consulta->bindValue(':tipo', $this->tipo);
				$consulta->bindValue(':nombre', $this->nombre);
				$consulta->bindValue(':precio', $this->precio);
	        	$consulta->execute();

				return true; 
    			
    		} catch (Exception $e) {
    			echo $e;
    		}
        }
    }
?>
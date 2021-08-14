<?php
	require_once 'conexion.php';
	date_default_timezone_set("America/Lima");
	
	class venta
	{
		var $codigoU;
		var $codigoA;
		var $datos;
		var $precio;
		var $tipo;

		public function getUsuario(){ return $this->codigoU; }
		public function setUsuario($codigoU){ $this->codigoU = $codigoU; }

	    public function getArticulo(){ return $this->codigoA; }
	 	public function setArticulo($codigoA){$this->codigoA = $codigoA;}
		
		public function getDatos(){ return $this->datos; }
	 	public function setDatos($datos){ $this->datos = $datos; }

		public function getPrecio(){ return $this->precio; }
	 	public function setPrecio($precio){ $this->precio = $precio; }

		public function getTipo(){ return $this->tipo; }
	 	public function setTipo($tipo){ $this->tipo = $tipo; }

		public function __construct($codigoU, $codigoA, $datos, $precio, $tipo){
			
            $this->codigoU = $codigoU;
            $this->codigoA = $codigoA;
            $this->datos = $datos;
            $this->precio = $precio;
			$this->tipo = $tipo;
		}

		public function crearVenta($codigoU, $codigoA, $datos, $precio, $tipo)
		{
			$con = new Conexion();
			$con->Conectar();
			
			$codigo= generarCodigoVentas();
			$this->codigoU = $codigoU;
            $this->codigoA = $codigoA;
            $this->datos = $datos;
            $this->precio = $precio;
			$this->tipo = $tipo;
		
    		try {
    			 $consulta=$con->conexion->prepare("INSERT INTO venta (codigo_venta,codigo_usu,codigo_arti,tipo,Datos,precio) VALUES(:codigo, :usuario, :articulo, :tipo, :datos, :precio)");
	         
				 $consulta->bindvalue(':codigo', $codigo);
				 $consulta->bindValue(':usuario', $this->codigoU);
				 $consulta->bindValue(':articulo', $this->codigoA);
				 $consulta->bindValue(':tipo', $this->tipo);
				 $consulta->bindValue(':datos', $this->datos);
                 $consulta->bindValue(':precio', $this->precio);
	         	 $consulta->execute();

      	   return true; 
    			
    		} catch (Exception $e) {
    			echo $e;
    		}
		}
		
		public function mostrarCompras($codigoU){

			$conexion = new Conexion();
		 	$conexion->Conectar();
		    $consulta = $conexion->conexion->prepare("SELECT * FROM venta WHERE codigo_usu ='$codigoU'");
		 	$consulta->execute();

			$rows = $consulta->fetchAll(\PDO::FETCH_OBJ);
			echo json_encode($rows);

		}
	}

	function generarCodigoVentas(){
		$Acodigo = date("m").date("y").rand(1000,9999);
		$codigo =(int)$Acodigo;
		return $codigo;
	}
?>
<?php
include 'lista.php';
include 'cancion.php';
include 'merch.php';
include 'articulo.php';
include 'venta.php';
require_once 'conexion.php';


if(isset($_GET['accion']))
{	$con = new mysqli("localhost:33065", "Brayan", "78958456" ,"16bits");
	$accion=$_GET['accion'];

	if($accion=='registrar')
	{
		$ListaID = $_GET['ListaID'];
		$cantidad=$_GET['CantidadA'];

		$i=0;

		if($cantidad=="" || $cantidad==0)
		{
			echo "1";
			return false;
		}
		while ($i <= $cantidad-1){

			$ruta	 = $_FILES['files']['tmp_name'][$i];			
			$titulo  = $_FILES['files']['name'][$i];
			$size  	 = $_FILES['files']['size'][$i];
			$tamaño = ($size/1024) . " KB";

			if($titulo=="")
			{ echo "1"; }
			else
			{
			$nuevaRuta="../audio/".$titulo;

			try{
				move_uploaded_file($ruta, $nuevaRuta);
			
			} catch (Exception $e) {
				echo $e;				
			}

			$cancion = new cancion($titulo, $ListaID, $tamaño);
			$cancion->crearCancion($cancion->nombre, $cancion->lista, $cancion->size);
			}
			$i++;
		}
	}
	if($accion=='mostrar')
	{
		try
		{		$ListaID= $_GET['ListaID'];
				$cancion = new cancion("", "", $ListaID);

				$cancion->lista=$ListaID;
			   	$cancion->CancionesPorLista($cancion->lista);

		} catch (Exception $e) {
			echo $e;
		}
	}
	if($accion=='lista')
	{
		try
		{
				$lista = new lista("","");
			   	$lista->mostrarListas();

		} catch (Exception $e) {
			echo $e;
		}
	}
	if($accion=='addLista'){
		try
		{		$nombre= $_GET['lista'];
				$lista = new lista("",$nombre);
			   	$lista->crearLista($lista->nombre);
			   	$lista->mostrarListas();
		} catch (Exception $e) {
			echo $e;
		}
	}
	if($accion=='regisarti'){
		
		$nombre = $_POST['nombre_merch'];
		$precio = $_POST['precio_merch'];
		$des = $_POST['descri_merch'];

		$ruta	 = $_FILES['file']['tmp_name'];
		$titulo  = $_FILES['file']['name'];

		if($titulo==""){
			echo "1"; 
		}
		else{
			$nuevaRuta="../articulos/".$titulo;

			try{
				move_uploaded_file($ruta, $nuevaRuta);
			
			} catch (Exception $e) {
				echo $e;				
			}
			$merch = new merch($nombre, $precio, $des, $titulo);
			$merch->crearMerch($merch->nombre, $merch->precio, $merch->descri, $merch->img);
		}
	}
	if($accion=='editarIframe')
	{
		try
		{
				$ListaID = $_GET['lista'];
				
				$sql ="UPDATE listaiframe SET LISTA_id= $ListaID WHERE id=1";
				if(mysqli_query($con,$sql))
				{
					echo "1";
				}
				else
				{
					echo "2";
				}

		} catch (Exception $e) {
			echo $e;
		}	
	}
	if($accion=='CanLista')
	{
		$lista = new lista("","");			   	
	   	$lista->mostrarDetallesListas();
	}
	if($accion=='EliminarCancion')
	{
		$id=$_GET['idCancion'];
		$cancion = new cancion("","","");
		$cancion->idCancion=$id;

	   	$cancion->eliminarCancion($cancion->idCancion);
	}

	if($accion=='EditarNombreLista')
	{
		$id=$_GET['idLista'];
		$nombre=$_GET['nombre'];
		$lista = new lista($id,$nombre);

		$lista->ActualizarLista($lista->idLista, $lista->nombre);
		$lista->mostrarDetallesListas();
	} 

	if($accion=='mostrarmerch'){
		try
		{
			$merch = new merch("", "", "", "");
			$merch->mostarMerch();

		} catch (Exception $e) {
			echo $e;
		}
	}
	if($accion=='addVenta'){

		$idarticulo = $_POST["idarticulo"];
		$idusuario = $_POST["idusuario"];
		$precio = $_POST["particulo"];
		$tipo = $_POST["tipo"];

		$datos  = $_POST["nombrecom"]." ".$_POST["telefono"]." ".$_POST["direccion"]." ".$_POST["region"]." ".$_POST["postal"];

		$venta = new venta($idusuario, $idarticulo, $datos, $precio, $tipo);
		$venta->crearVenta($venta->codigoU,$venta->codigoA,$venta->datos, $venta->precio, $venta->tipo);

	}
	if($accion=='mostrarVentas'){

		$idusuario = $_POST["idusuario"];

		$venta = new venta($idusuario, "", "", "", "");
		$venta->mostrarCompras($venta->codigoU);
	}
 }
 function generarArticulo($Acodigo, $Anombre, $Aprecio){
	try
	{
		$tipo="1";
		$articulo = new articulo($Acodigo, $Anombre, $Aprecio, $tipo);
		$articulo->crearArticulo($articulo->codigo,$articulo->nombre,$articulo->precio,$articulo->tipo);

	} catch (Exception $e) {
		echo $e;
	}
}

function generarArticulo1($Acodigo, $Anombre){

	$articulo = new articulo($Acodigo, $Anombre, 2, 10);
	$articulo->crearArticulo($articulo->codigo,$articulo->nombre,$articulo->precio,$articulo->tipo);
}

?>
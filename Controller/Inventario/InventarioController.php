<?php
include_once '../Model/Inventario/InventarioModel.php';
class InventarioController
{
	private $objInventario;

	public function __construct(){
		$this->objInventario= new InventarioModel();
	}
	

	public function crear()
	{
		$estados=$this->objInventario->consultar(
			"*",
			"estado"			//tablas
		);	//condiciones
		$lineas=$this->objInventario->consultar("*","linea");
		$colors=$this->objInventario->consultar("*","color");
		
		$num_pro=$this->objInventario->autoIncrement("pro_id", "producto");
		
		$this->objInventario->close();
		include_once '../View/Inventario/crear.html.php';
	}
	
	public function postCrear()
	{
		extract($_POST);
		
		$pro=$this->objInventario->consultar("*","producto","pro_id=$Codigo");
		if($pro->num_rows>0)
		{
			alertas("el producto ya existe");
			redirect(getUrl("producto","producto","crear"));
		}
		else
		{
			if(isset($_POST))
			{
				$proimagen=explode(".",$_FILES['ImagenProducto']['name']);
				$nombre_proimg='Producto_'.$Codigo."_".$Nombre.".".end($proimagen);
				$ruta_temp=$_FILES['ImagenProducto']['tmp_name'];
				$rutaproimg="ProductosImg/".$nombre_proimg;
				if(move_uploaded_file($ruta_temp, $rutaproimg))
				{
					$rutaproimg=$rutaproimg;
				}
				else
				{
					$rutaproimg=null;
				}
				$despieceimagen=explode(".",$_FILES['ImagenDespiece']['name']);
				$nombre_desimg='ProDespiece_'.$Codigo."_".$Nombre.".".end($despieceimagen);
				$ruta_temp=$_FILES['ImagenDespiece']['tmp_name'];
				$rutadesimg="ProductosImg/".$nombre_desimg;
				if(move_uploaded_file($ruta_temp, $rutadesimg))
				{
					$rutadesimg=$rutadesimg;
				}
				else
				{
					$rutadesimg=null;
				}
				$figurinimagen=explode(".",$_FILES['ImagenFigurin']['name']);
				$nombre_figimg='ProFigurin_'.$Codigo."_".$Nombre.".".end($figurinimagen);
				$ruta_temp=$_FILES['ImagenFigurin']['tmp_name'];
				$rutafigimg="ProductosImg/".$nombre_figimg;
				if(move_uploaded_file($ruta_temp, $rutafigimg))
				{
					$rutafigimg=$rutafigimg;
				}
				else
				{
					$rutafigimg=null;
				}
				$procopeimagen=explode(".",$_FILES['ImagenProcesoOp']['name']);
				$nombre_propimg='ProProcOp_'.$Codigo."_".$Nombre.".".end($procopeimagen);
				$ruta_temp=$_FILES['ImagenProcesoOp']['tmp_name'];
				$rutapropimg="ProductosImg/".$nombre_propimg;
				if(move_uploaded_file($ruta_temp, $rutapropimg))
				{
					$rutapropimg=$rutapropimg;
				}
				else
				{
					$rutapropimg=null;
				}
				$this->objInventario->insertar('producto',false,"$Codigo, '$Nombre', '$Descripcion', $Precio, '$rutaproimg', '$rutadesimg', '$rutafigimg', '$rutapropimg', '$FechaRegistro', $Estado, $Linea, $Color, $Cantidad");
			}
			alertas("Producto registrado con exito!!");
			$this->objInventario->close();
			redirect(getUrl("producto", "producto", "listar"));
		}
		
	}

	public function listar()
	{
		$productos=$this->objInventario->consultar("pro_id, pro_nombre, pro_descripcion, pro_precio, pro_fecha_registro, est_descripcion, lin_nombre,col_nombre", "producto, estado, linea, color", "producto.est_id=estado.est_id and  producto.lin_id=linea.lin_id and producto.col_id=color.col_id and estado.est_descripcion='Activo' order by pro_nombre");
		$this->objInventario->close();
		include_once'../view/Inventario/listar.html.php';
	}

	public function getEditar()
	{
		$Codigo=$_GET['Codigo'];
		$producto=$this->objInventario->consultar("*","producto","pro_id=$Codigo");
		$estados=$this->objInventario->consultar("*","estado");
		$lineas=$this->objInventario->consultar("*","linea");
		$colors=$this->objInventario->consultar("*","color");

		$this->objInventario->close();
		include_once'../View/Inventario/editar.html.php';
	}

	public function postEditar()
	{
		extract($_POST);

		if($_FILES['ImagenProducto']['tmp_name']<>"")
		{
			$proimagen=explode(".",$_FILES['ImagenProducto']['name']);
			$nombre_proimg='Producto_'.$Codigo."_".$Nombre.".".end($proimagen);
			$ruta_temp=$_FILES['ImagenProducto']['tmp_name'];
			$newrutaproimg="ProductosImg/".$nombre_proimg;
			if(move_uploaded_file($ruta_temp, $newrutaproimg))
			{
				$rutaproimg=$newrutaproimg;
			}
		}
		else
		{
			$rutaproimg=$RutaProImg;
		}
		if($_FILES['ImagenDespiece']['tmp_name']<>"")
		{
			$despieceimagen=explode(".",$_FILES['ImagenDespiece']['name']);
			$nombre_desimg='ProDespiece_'.$Codigo."_".$Nombre.".".end($despieceimagen);
			$ruta_temp=$_FILES['ImagenDespiece']['tmp_name'];
			$newrutadesimg="ProductosImg/".$nombre_desimg;
			if(move_uploaded_file($ruta_temp, $newrutadesimg))
			{
				$rutadesimg=$newrutadesimg;
			}
		}
		else
		{
			$rutadesimg=$RutaDesImg;
		}
		if($_FILES['ImagenFigurin']['tmp_name']<>"")
		{
			$figurinimagen=explode(".",$_FILES['ImagenFigurin']['name']);
			$nombre_figimg='ProFigurin_'.$Codigo."_".$Nombre.".".end($figurinimagen);
			$ruta_temp=$_FILES['ImagenFigurin']['tmp_name'];
			$newrutafigimg="ProductosImg/".$nombre_figimg;
			if(move_uploaded_file($ruta_temp, $newrutafigimg))
			{
				$rutafigimg=$newrutafigimg;
			}
		}
		else
		{
			$rutafigimg=$RutaFigImg;
		}
		if($_FILES['ImagenProducto']['tmp_name']<>"")
		{
			$procopeimagen=explode(".",$_FILES['ImagenProcesoOp']['name']);
			$nombre_propimg='ProProcOp_'.$Codigo."_".$Nombre.".".end($procopeimagen);
			$ruta_temp=$_FILES['ImagenProcesoOp']['tmp_name'];
			$newrutapropimg="ProductosImg/".$nombre_propimg;
			if(move_uploaded_file($ruta_temp, $newrutapropimg))
			{
				$rutapropimg=$newrutapropimg;
			}
		}
		else
		{
			$rutapropimg=$RutaPrOpImg;
		}
		

		$this->objInventario->editar(
		'producto',
		"pro_id='$Codigo'",
		array("pro_nombre"=>"'$Nombre'",
				"pro_descripcion"=>"'$Descripcion'",
				"pro_precio"=>"'$Precio'",
				"pro_fecha_registro"=>"'$FechaRegistro'",
				"est_id"=>"'$Estado'",
				"pro_cantidad"=>"'$Cantidad'"));

		redirect(getUrl("producto","producto","listar"));
		$this->objInventario->close();
	}

	public function postEliminar(){

		$Codigo=$_GET['Codigo'];
		$this->objInventario->eliminar(
			'producto',
			"pro_id='$Codigo'");
		alertas("Producto eliminado con exito");
		redirect(getUrl("producto","producto","listar"));
		$this->objInventario->close();
	}
}
?>
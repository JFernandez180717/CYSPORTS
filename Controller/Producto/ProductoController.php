<?php
include_once '../Model/Producto/ProductoModel.php';
class ProductoController
{
	private $objProducto;

	public function __construct(){
		$this->objProducto= new ProductoModel();
	}
	

	public function crear()
	{
		$colors=$this->objProducto->consultar("*","color");
		$tiposProductos=$this->objProducto->consultar("*","tiposproducto");
		
		$num_pro=$this->objProducto->autoIncrement("idproducto", "producto");
		
		$this->objProducto->close();
		include_once '../View/Producto/crear.html.php';
	}
	
	public function postCrear()
	{
		extract($_POST);
		
		$pro = $this->objProducto->consultar("*","producto","idproducto=$Codigo");
		if($pro->num_rows>0){
			alertas("el producto ya existe");
			redirect(getUrl("producto","producto","crear"));
		} else {
			if(isset($_POST))
			{
				$proimagen=explode(".",$_FILES['ImagenProducto']['name']);
				$nombre_proimg='Producto_'.$Codigo."_".$Descripcion.".".end($proimagen);
				$ruta_temp=$_FILES['ImagenProducto']['tmp_name'];
				$rutaproimg="ProductosImg/".$nombre_proimg;
				if(move_uploaded_file($ruta_temp, $rutaproimg)){
					$rutaproimg=$rutaproimg;
				} else {
					$rutaproimg=null;
				}
				$this->objProducto->insertar('producto',false,"$Codigo, '$Descripcion', $Tipo, $Cantidad, $Color, '$Estado', $Precio, '$rutaproimg', '$FechaRegistro'");
			}
			alertas("Producto registrado con exito!!");
			$this->objProducto->close();
			redirect(getUrl("producto", "producto", "listar"));
		}
		
	}

	public function listar()
	{
		$productos=$this->objProducto->consultar("p.idproducto, p.descripcion, t.descripcion descripcionproducto, p.cantidad, c.nombrecolor, p.estado, p.precio, p.fecharegistro", "producto p, color c, tiposproducto t", "p.idcolor = c.idcolor and p.codtipoproducto = t.codtipoproducto order by p.descripcion");
		$this->objProducto->close();
		include_once'../view/Producto/listar.html.php';
	}

	public function getEditar()
	{
		$Codigo=$_GET['Codigo'];
		$producto=$this->objProducto->consultar("p.idproducto, p.descripcion, p.codtipoproducto, p.cantidad, p.idcolor, c.nombrecolor, p.estado, p.precio, date_format(p.fecharegistro,'%Y-%m-%d') fecharegistro, p.imagenproducto","producto p, color c","p.idproducto=$Codigo and p.idcolor = c.idcolor");
		$tiposProductos = $this->objProducto->consultar("*","tiposproducto");

		$this->objProducto->close();
		include_once'../View/Producto/editar.html.php';
	}

	public function postEditar()
	{
		extract($_POST);

		if($_FILES['ImagenProducto']['tmp_name']<>"")
		{
			$proimagen=explode(".",$_FILES['ImagenProducto']['name']);
			$nombre_proimg='Producto_'.$Codigo."_".$Descripcion.".".end($proimagen);
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

		$this->objProducto->editar(
		'producto',
		"idproducto='$Codigo'",
		array("descripcion"=>"'$Descripcion'",
				"precio"=>"'$Precio'",
				"fecharegistro"=>"'$fecharegistro'",
				"estado"=>"'$Estado'",
				"cantidad"=>"'$Cantidad'"));

		redirect(getUrl("producto","producto","listar"));
		$this->objProducto->close();
	}

	public function postEliminar(){

		$Codigo=$_GET['Codigo'];
		$this->objProducto->eliminar(
			'producto',
			"idproducto='$Codigo'");
		alertas("Producto eliminado con exito");
		redirect(getUrl("producto","producto","listar"));
		$this->objProducto->close();
	}
}
?>
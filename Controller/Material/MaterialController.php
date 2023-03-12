<?php
include_once '../Model/Material/MaterialModel.php';
class MaterialController
{
	private $objMaterial;

	public function __construct(){
		$this->objMaterial= new MaterialModel();
	}
	

	public function crear()
	{
		$estados=$this->objMaterial->consultar(
			"*",
			"estado"			//tablas
		);	//condiciones
		$UniMed=$this->objMaterial->consultar("*","unidad_medida");
		$colors=$this->objMaterial->consultar("*","color");
		
		$num_mat=$this->objMaterial->autoIncrement("mat_id", "material");
		
		$this->objMaterial->close();
		include_once '../View/Material/crear.html.php';
	}
	
	public function postCrear()
	{
		extract($_POST);
		
		$mat=$this->objMaterial->consultar("*","material","mat_id=$Codigo");
		if($mat->num_rows>0)
		{
			alertas("el material ya existe");
			redirect(getUrl("material","material","crear"));
		}
		else
		{
			if(isset($_POST))
			{
				$matimagen=explode(".",$_FILES['ImagenMaterial']['name']);
				$nombre_matimg='material_'.$Codigo."_".$Descripcion.".".end($matimagen);
				$ruta_temp=$_FILES['ImagenMaterial']['tmp_name'];
				$rutamatimg="MaterialImg/".$nombre_matimg;
				if(move_uploaded_file($ruta_temp, $rutamatimg))
				{
					$rutamatimg=$rutamatimg;
				}
				else
				{
					$rutamatimg=null;
				}
				
				$this->objMaterial->insertar('material',false,"$Codigo, '$Descripcion', '$rutamatimg', $CostoUnidad, $UnidadMedida, $Color, $Estado, $Cantidad");
			}
			alertas("Material registrado con exito!!");
			$this->objMaterial->close();
			//redirect(getUrl("material", "material", "listar"));
		}
		
	}

	public function listar()
	{
		$materiales=$this->objMaterial->consultar("mat_id, mat_descripcion, mat_costo_unidad, uni_med_descripcion, col_nombre, est_descripcion, mat_cantidad", "material, estado, unidad_medida, color", "material.est_id=estado.est_id and material.col_id=color.col_id and material.uni_med_id=unidad_medida.uni_med_id and estado.est_descripcion='Activo' order by mat_descripcion");
		$this->objMaterial->close();
		include_once'../view/Material/listar.html.php';
	}

	public function getEditar()
	{
		$Codigo=$_GET['Codigo'];
		$material=$this->objMaterial->consultar("*","material","mat_id=$Codigo");
		$estados=$this->objMaterial->consultar("*","estado");
		$UniMed=$this->objMaterial->consultar("*","unidad_medida");
		$colors=$this->objMaterial->consultar("*","color");

		$this->objMaterial->close();
		include_once'../View/Material/editar.html.php';
	}

	public function postEditar()
	{
		extract($_POST);

		if($_FILES['ImagenMaterial']['tmp_name']<>"")
		{
			$matimagen=explode(".",$_FILES['ImagenMaterial']['name']);
			$nombre_matimg='Material_'.$Codigo."_".$Descripcion.".".end($matimagen);
			$ruta_temp=$_FILES['ImagenMaterial']['tmp_name'];
			$newrutamatimg="MaterialImg/".$nombre_matimg;
			if(move_uploaded_file($ruta_temp, $newrutamatimg))
			{
				$rutamatimg=$newrutamatimg;
			}
		}
		else
		{
			$rutamatimg=$RutaMatImg;
		}

		$this->objMaterial->editar(
		'material',
		"mat_id='$Codigo'",
		array("mat_descripcion"=>"'$Descripcion'",
				"mat_costo_unidad"=>"'$CostoUnidad'",
				"mat_cantidad"=>"'$Cantidad'"));

		redirect(getUrl("material","material","listar"));
		$this->objMaterial->close();
	}

	public function postEliminar(){

		$Codigo=$_GET['Codigo'];
		$this->objMaterial->eliminar(
			'material',
			"mat_id='$Codigo'");
		alertas("Material eliminado con exito");
		redirect(getUrl("material","material","listar"));
		$this->objMaterial->close();
	}
}
?>
<?php
include_once '../Model/Unidad_Medida/UnidadMedidaModel.php';
class UnidadMedidaController
{
	private $objUnidadMedida;

	public function __construct(){
		$this->objUnidadMedida= new UnidadMedidaModel();
	}
	

	public function crear()
	{
		$estados=$this->objUnidadMedida->consultar(
			"*",
			"estado"			//tablas
		);	//condiciones
		$num_uni=$this->objUnidadMedida->autoIncrement("uni_med_id", "unidad_medida");
		
		$this->objUnidadMedida->close();
		include_once '../View/Unidad_Medida/crear.html.php';
	}
	
	public function postCrear()
	{
		extract($_POST);
		
		$uni=$this->objUnidadMedida->consultar("*","unidad_medida","uni_med_id=$Codigo");
		if($uni->num_rows>0)
		{
			alertas("la unidad medida ya existe");
			redirect(getUrl("Unidad_Medida","UnidadMedida","crear"));
		}
		else
		{
			$this->objUnidadMedida->insertar('unidad_medida',false,"$Codigo, '$Descripcion', $Estado");
			
			alertas("Unidad medida registrada con exito!!");
			$this->objUnidadMedida->close();
			redirect(getUrl("Unidad_Medida", "UnidadMedida", "listar"));
		}
		
	}

	public function listar()
	{
		$unidadmedida=$this->objUnidadMedida->consultar("uni_med_id, uni_med_descripcion, est_descripcion", "unidad_medida, estado", "unidad_medida.est_id=estado.est_id and estado.est_descripcion='Activo' order by uni_med_descripcion");
		$this->objUnidadMedida->close();
		include_once'../view/Unidad_Medida/listar.html.php';
	}

	public function getEditar()
	{
		$Codigo=$_GET['Codigo'];
		$unidadmedida=$this->objUnidadMedida->consultar("*","unidad_medida","uni_med_id=$Codigo");
		$estados=$this->objUnidadMedida->consultar("*","estado");

		$this->objUnidadMedida->close();
		include_once'../View/Unidad_Medida/editar.html.php';
	}

	public function postEditar()
	{
		extract($_POST);

		$this->objUnidadMedida->editar(
		'unidad_medida',
		"uni_med_id='$Codigo'",
		array("uni_med_descripcion"=>"'$Descripcion'"
				));

		redirect(getUrl("Unidad_Medida","UnidadMedida","listar"));
		$this->objUnidadMedida->close();
	}

	public function postEliminar(){

		$Codigo=$_GET['Codigo'];
		$this->objUnidadMedida->eliminar(
			'unidad_medida',
			"uni_med_id='$Codigo'");
		alertas("Unidad Medida eliminada con exito");
		redirect(getUrl("Unidad_Medida","UnidadMedida","listar"));
		$this->objUnidadMedida->close();
	}
}
?>
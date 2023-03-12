<?php
include_once '../Model/Operacion/OperacionModel.php';
class OperacionController
{
	private $objOperacion;

	public function __construct(){
		$this->objOperacion= new OperacionModel();
	}
	

	public function crear()
	{
		$estados=$this->objOperacion->consultar(
			"*",
			"estado"			//tablas
		);	//condiciones
		$num_ope=$this->objOperacion->autoIncrement("ope_id", "operacion");
		
		$this->objOperacion->close();
		include_once '../View/Operacion/crear.html.php';
	}
	
	public function postCrear()
	{
		extract($_POST);
		
		$ope=$this->objOperacion->consultar("*","operacion","ope_id=$Codigo");
		if($ope->num_rows>0)
		{
			alertas("la operacion ya existe");
			redirect(getUrl("operacion","operacion","crear"));
		}
		else
		{
			$this->objOperacion->insertar('operacion',false,"$Codigo, '$Descripcion', $Estado");
			
			alertas("Operacion registrada con exito!!");
			$this->objOperacion->close();
			redirect(getUrl("operacion", "operacion", "listar"));
		}
		
	}

	public function listar()
	{
		$operaciones=$this->objOperacion->consultar("ope_id, ope_descripcion, est_descripcion", "operacion, estado", "operacion.est_id=estado.est_id and estado.est_descripcion='Activo' order by ope_descripcion");
		$this->objOperacion->close();
		include_once'../view/Operacion/listar.html.php';
	}

	public function getEditar()
	{
		$Codigo=$_GET['Codigo'];
		$operacion=$this->objOperacion->consultar("*","operacion","ope_id=$Codigo");
		$estados=$this->objOperacion->consultar("*","estado");

		$this->objOperacion->close();
		include_once'../View/Operacion/editar.html.php';
	}

	public function postEditar()
	{
		extract($_POST);

		$this->objOperacion->editar(
		'operacion',
		"ope_id='$Codigo'",
		array("ope_descripcion"=>"'$Descripcion'"
				));

		redirect(getUrl("operacion","operacion","listar"));
		$this->objOperacion->close();
	}

	public function postEliminar(){

		$Codigo=$_GET['Codigo'];
		$this->objOperacion->eliminar(
			'operacion',
			"ope_id='$Codigo'");
		alertas("Operacion eliminada con exito");
		redirect(getUrl("operacion","operacion","listar"));
		$this->objOperacion->close();
	}
}
?>
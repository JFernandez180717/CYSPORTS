<?php
include_once '../Model/Login/LoginModel.php';
class LoginController {
    private $objLogin;

	public function __construct(){
		$this->objLogin = new LoginModel();
	}

    public function validaLogin () {
        extract($_POST);
        /* $usuario = $_POST['usuario'];
        $password = $_POST['password']; */
        $resultado = $this->objLogin->consultar("*","usuarios","usuario='$usuario' and clave='$password'");
        if ($resultado->num_rows > 0) {
            include_once '../Web/index.php';
        } else {
            alertas('Usuario y/o contraseña invalidos');
            include_once '../Web/login.php';
        }
    }
}
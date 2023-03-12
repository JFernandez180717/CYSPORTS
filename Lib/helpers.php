<?php
@session_start();
function getUrl($modulo,$controlador,$funcion,$parametros=false, $ajax=false)
{
    if($ajax==false)
    {
        $pagina="index";
    }
    else
    {
        $pagina="ajax";
    }
			
    $url="$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

    if($parametros!=false){
            foreach($parametros as $key=>$valor){
                    $url.="&$key=$valor";
            }
    }

    return $url;
}

function getTitle($modulo,$funcion)
{

	$return="";
	
	return $return;
}

function dd($variable){
	echo "<pre>";
	die(print_r($variable));
}

function redirect($url){
	echo "<script type='text/javascript'>
	window.location.href='$url';</script>";
}




function cargarForms()
{
     if(!isset($_GET['modulo']) && !isset($_GET['controlador']) && !isset($_GET['funcion'])){
                    
            }
            else
            {
               
                $modulo= ucwords($_GET['modulo']);
                $controlador= $_GET['controlador'];
                $funcion= $_GET['funcion'];

                if(is_dir("../Controller/" . $modulo))
                {
                    if(file_exists("../Controller/" . $modulo . "/" . $controlador . "Controller.php"))
                    {
                        include_once('../Controller/' . $modulo . '/' . $controlador .'Controller.php');
                        $nombreClase= $controlador ."Controller";
                        $objControlador= new $nombreClase();

                        if(method_exists($objControlador,$funcion))
                        {
                            $objControlador->$funcion();
                        }
                        else
                        {
                            die("La funcion especificada no existe");
                        }

                    }
                    else
                    {
                        die("El controlador especificado no existe");
                    }
                }
                else
                {
                    die("El modulo especificado no existe");
                }
            }
}

function comprobarCaracteresEspeciales($cadena){ 
   if (preg_match("/^[a-zA-Z0-9\-_@. ]{1,70}$/", $cadena)) { 
      return true; 
   } else { 
      return false; 
   } 
}

function alertas($mensaje){
	echo "<script type='text/javascript'>
		alert('$mensaje');
	</script>";
}


    function nombreMes($mes)
{
    $nom_mes="";
    switch ($mes)
    {
        case 1:
            $nom_mes="Enero";
        break;
    
        case 2:
            $nom_mes="Febrero";
        break;
    
        case 3:
            $nom_mes="Marzo";
        break;
        
        case 4:
            $nom_mes="Abril";
        break;
    
        case 5:
            $nom_mes="Mayo";
        break;
    
        case 6:
            $nom_mes="Junio";
        break;
            
        case 7:
            $nom_mes="Julio";
        break;
        
        case 8:
            $nom_mes="Agosto";
        break;
    
    
        case 9:
            $nom_mes="Septiembre";
        break;
    
        case 10:
            $nom_mes="Octubre";
        break;
    
        case 11:
            $nom_mes="Noviembre";
        break;
    
        case 12:
            $nom_mes="Diciembre";
        break;
    }
    
    return $nom_mes;
}

?>
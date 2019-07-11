<?php

function conexion_db($bd_config){
	try{
		$conexion_db = new PDO("mysql:host=localhost;dbname=" . $bd_config['database'], $bd_config['user_db'], $bd_config['pass_db']);
		return $conexion_db;
	} catch (PDOException $e){
		return false;
	}
}

/*class Conectar{
	var $host;
	var $dbName;
	var $dbUser;
	var $dbPass;

	function Conectar(){
		$this -> $host = 'localhost';
		$this -> $dbName = 'app_support';
		$this -> $dbUser = 'root';
		$this -> $dbPass = '';
	}

	function conexion_db(){
		try{
			$conexion_db = new PDO("mysql:host=" .$host. ";dbname=" . $dbName, $dbUser, $dbPass);
			return $conexion_db;
		} catch (PDOException $e){
			return false;
		}
	}
	
}*/


function limpiarTexto($dato)
{
	$dato = filter_var($dato, FILTER_SANITIZE_STRING);
	return $dato;
}

function limpiarCorreo($correo)
{
	$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
	return $correo;
}

function insertarCliente($conexion, $empresa, $n_dominio, $correo, $hosting, $dominio, $soporte, $envio)
	{		
			$insertar = 'INSERT INTO clients (name_company, name_domain, email_client, date_hosting, date_domain, date_support, correo_enviado) VALUES (:company, :domain, :email, :dHosting, :dDomain, :dSupport, :envio)';
			$agregar = $conexion->prepare($insertar);
			$agregar->execute(array(
				':company' => $empresa,
				':domain' => $n_dominio,
				':email' => $correo,
				':dHosting' => $hosting,
				':dDomain' => $dominio,
				':dSupport' => $soporte,
				':envio' => $envio
 			));
	}


function editarCliente($conexion, $id_empresa, $empresa, $n_dominio, $correo, $hosting, $dominio, $soporte)
	{		
			$nuevoRegistro = "UPDATE clients SET name_company = :company, name_domain= :domain, email_client= :email, date_hosting= :dHosting, date_domain= :dDomain, date_support= :dSupport WHERE id_client = :id_empresa";
			$editarRegistro = $conexion->prepare($nuevoRegistro);
			$editarRegistro->execute(array(
				':id_empresa' => $id_empresa,
				':company' => $empresa,
				':domain' => $n_dominio,
				':email' => $correo,
				':dHosting' => $hosting,
				':dDomain' => $dominio,
				':dSupport' => $soporte
 			));
	}


function borrarCliente($conexion, $id_empresa)
	{		
			$verRegistro = "DELETE FROM clients WHERE id_client = :id_empresa";
			$borrarRegistro = $conexion->prepare($verRegistro);
			$borrarRegistro->execute(array(
				':id_empresa' => $id_empresa
 			));
	}

function restablecer($conexion)
	{		
			$restableciendo = "ALTER TABLE clients AUTO_INCREMENT = 10";
			$sqlStatement = $conexion->prepare($restableciendo);

			$sqlStatement -> execute();
	}

function automatizar($conexion_db){
	$buscar = "SELECT * FROM clients WHERE correo_enviado = 'no'";
	$envioCorreos = $conexion_db->prepare($buscar);
	$envioCorreos->execute();
	$envioCorreos = $envioCorreos->fetchAll();
	
	foreach ($envioCorreos as $clienteFalta) {
		$correoCliente = $clienteFalta['email_client'];
		$idCliente =  $clienteFalta['id_client'];
		$pagCliente = $clienteFalta['name_domain'];

		$fechaVencimiento = $clienteFalta['date_support'];
		$fechaActual = date('Y-m-d');

		$fechaVencimiento = new DateTime($fechaVencimiento);
		$fechaActual = new DateTime($fechaActual);

		$diff = $fechaVencimiento->diff($fechaActual);

		$resultado = $diff->days;

		if ($resultado <= 8) {
			// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'From: Soporte Técnico <webmaster@univercity.com.co>' . "\r\n";

			$mensaje = '
				<html>
					<head>
					<title>Recordatorio vencimiento de soporte</title>
					</head>
					<body>
					<p>Tu soporte técnico del sitio web ' . $pagCliente . '  está a punto de vencer</p>
					<h2>Quedan '. $resultado .' días</h2>
					
					</body>
				</html>
			';
			mail($correoCliente, "Asunto de prueba", $mensaje, $cabeceras);

			$dato_envio = "UPDATE clients SET correo_enviado = 'si' WHERE id_client = $idCliente";
			$actualizar = $conexion_db->prepare($dato_envio);
			$actualizar->execute();

			header('Location:index.php');
		}

	}
}
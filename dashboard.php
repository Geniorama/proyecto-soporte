<?php

require '../config.php';
require '../functions.php';

$conexion_db = conexion_db($bd_config);

if ($conexion_db) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-create'])) {
        $nombre_empresa = $_POST['nombre-empresa'];
        $nombre_dominio = $_POST['nombre-dominio'];
        $correo_empresa = $_POST['correo-empresa'];
        $venc_hosting = $_POST['venc-hosting'];
        $venc_dominio = $_POST['venc-dominio'];
        $venc_soporte = $_POST['venc-soporte'];
        $envio_correo = 'no';

        insertarCliente($conexion_db, $nombre_empresa, $nombre_dominio, $correo_empresa, $venc_hosting, $venc_dominio, $venc_soporte, $envio_correo);

        header('Location: dashboard.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-edit1'])) {
        $id_empresa = $_POST['idEmpresa'];
        $nombre_empresa = $_POST['nombre-empresa'];
        $nombre_dominio = $_POST['nombre-dominio'];
        $correo_empresa = $_POST['correo-empresa'];
        $venc_hosting = $_POST['venc-hosting'];
        $venc_dominio = $_POST['venc-dominio'];
        $venc_soporte = $_POST['venc-soporte'];

        editarCliente($conexion_db, $id_empresa, $nombre_empresa, $nombre_dominio, $correo_empresa, $venc_hosting, $venc_dominio, $venc_soporte);

        header('Location: dashboard.php');
    }

    $datos = $conexion_db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM clients ORDER BY id_client");
    $datos->execute();
    $datos = $datos->fetchAll();

    automatizar($conexion_db);
}


$theClass = "homepage";
include_once '../header.php';
require '../views/dashboard.view.php';
include_once '../footer.php';
<?php
require 'config.php';
require 'functions.php';

$conexion_db = conexion_db($bd_config);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-edit'])) {
    $id_empresa = $_POST['idEmpresa'];
    $nombre_empresa = $_POST['nombre-empresa'];
    $nombre_dominio = $_POST['nombre-dominio'];
    $correo_empresa = $_POST['correo-empresa'];
    $venc_hosting = $_POST['venc-hosting'];
    $venc_dominio = $_POST['venc-dominio'];
    $venc_soporte = $_POST['venc-soporte'];

    echo $nombre_empresa;

    editarCliente($conexion_db, $id_empresa, $nombre_empresa, $nombre_dominio, $correo_empresa, $venc_hosting, $venc_dominio, $venc_soporte);

    header('Location: admin/dashboard.php');
}
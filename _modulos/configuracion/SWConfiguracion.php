<?php
/*------------------------------------------------------------------------------
 *                 AUTOR: FRANCISCO JOSE RODRIGUEZ SOTELO
 * FECHA DE CODIFICACION: 1 DE SEPTIEMBRE DE 2016
 *                TITULO: PARAMETROS DE CONFIGURACION DEL SITIO WEB Y CONEXION
 *                        A BASE DE DATOS
 *              OBJETIVO: FACILITAR EL CAMBIO DE LOS PARAMETROS PARA TRASLADO DE
 *                        APLICACION DE UN SERVIDOR A OTRO.
 * TIEMPO DE REALIZACION: 20 MINUTOS.
 *         OBSERVACIONES: 
 *----------------------------------------------------------------------------*/
//ESTABLECE JUEGO DE CARATERES
header('Content-type: text/html; charset=iso-8859-1');
//ESTABLECE LA HORA LOCAL
date_default_timezone_set('America/Mexico_City');
//ESTABLECE EL DOMINIO
define('DOMINIO', "localhost/weightlog");
//ESTABLECE LA CAPERTA RAIZ DE UN SITIO EN CASO DE COMPARTIR DOMINIO
define('RAIZ', '');        
//ESTABLECE EL PROTOCO HTTP/HTTPS
define('PROTOCOLO', 'http');
//ESTABLECE EL TITULO DEL SITIO.
define('TITULOSITIO', 'WeightLog/Bitacora de Peso');
//ESTABLECE EL IDIOMA DEL SITIO.
define('IDIOMA', 'es');
//ESTABLECE EL DOCTYPE DEL SITIO.
define('DOCTYPE', '<!DOCTYPE HTML>');
?>

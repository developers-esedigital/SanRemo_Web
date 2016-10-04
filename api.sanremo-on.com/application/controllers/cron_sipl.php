<?php
define( 'PARSE_SDK_DIR', 'parse/' ); //./parse/
require 'autoload.php';
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//date_default_timezone_set('Europe/Madrid');
//echo date('Y-m-d H:i:s');
use Parse\ParseInstallation;
use Parse\ParseClient;
use Parse\ParsePush;
ParseClient::initialize('t8VRJSjC6EUBKoqxKSannGVUwSTrqbIU8WlKH7HB', 'jkj5A4IS2DWhzsa9MFONjHn6mipV4ATH5hp0CORA', 'seU4A4yZeObNaQBwhzcDUTqolBglzeLNI9x1j55S');
$link=mysql_connect("localhost", "test", "esedigital");
mysql_select_db("sanremoon");
$result=mysql_query("select count(*) from noticia where estatus=0 and enviado=0");
$row = mysql_fetch_row($result);
if ($row[0]>0) {
	$data = array("tipo"=>"1","alert" => "Ci sono nuove news su Sanremo-On");
	$query = ParseInstallation::query();
	$query->equalTo('deviceType', 'android');
	ParsePush::send(array(
    	"where" => $query,
	    "data" => $data
	));
}
    if ($row[0]>0) {
        $data = array("tipo"=>"1","alert" => "Ci sono nuove news su Sanremo-On");
        $query = ParseInstallation::query();
        $query->equalTo('deviceType', 'ios');  //To push to ios devices, you must first configure a valid certificate
        ParsePush::send(array(
                              "where" => $query,
                              "data" => $data
                              ));
    }
mysql_query("update noticia set enviado=1 where estatus=0");
$result=mysql_query("select count(*) from evento where estatus=0 and enviado=0");
$row = mysql_fetch_row($result);
if ($row[0]>0) {
	$data = array("tipo"=>"2","alert" => "Ci sono nuovi eventi in Sanremo-On");
	$query = ParseInstallation::query();
	$query->equalTo('deviceType', 'android');
	ParsePush::send(array(
    	"where" => $query,
	    "data" => $data
	));
}
    if ($row[0]>0) {
        $data = array("tipo"=>"2","alert" => "Ci sono nuovi eventi in Sanremo-On");
        $query = ParseInstallation::query();
        $query->equalTo('deviceType', 'ios');  //To push to ios devices, you must first configure a valid certificate
        ParsePush::send(array(
                              "where" => $query,
                              "data" => $data
                              ));
    }
mysql_query("update evento set enviado=1 where estatus=0");
$result=mysql_query("select oferta.idoferta as idz, microsite.nombre as mnom from oferta inner join microsite on (oferta.idmicrosite=microsite.idmicrosite) where oferta.estatus=0 and oferta.enviado=0");
$row = mysql_fetch_array($result);
if ($row) {
	$nombre=json_decode($row['mnom']);
	$data = array("tipo"=>"3","oferta"=>$row['idz'],"alert" =>$nombre->it." ha pubblicato un offerta");
	$query = ParseInstallation::query();
	$query->equalTo('deviceType', 'android');
	ParsePush::send(array(
    	"where" => $query,
	    "data" => $data
	));
}
    if ($row) {
        $nombre=json_decode($row['mnom']);
        $data = array("tipo"=>"3","oferta"=>$row['idz'],"alert" =>$nombre->it." ha pubblicato un offerta");
        $query = ParseInstallation::query();
        $query->equalTo('deviceType', 'ios');  //To push to ios devices, you must first configure a valid certificate
        ParsePush::send(array(
                              "where" => $query,
                              "data" => $data
                              ));
    }
mysql_query("update oferta set enviado=1 where estatus=0");
mysql_free_result($result);
/*
$result=mysql_query("select * from marketing where enviado='S' and hora<='".date('H:i:s')."'");
$row = mysql_fetch_array($result);
mysql_free_result($result);
if ($row) {
$data = array("alert" => utf8_encode($row['descripcion']));
$query = ParseInstallation::query();
$query->equalTo('deviceType', 'android');
//$query->equalTo('deviceType', 'ios');  //To push to ios devices, you must first configure a valid certificate
ParsePush::send(array(
    "where" => $query,
    "data" => $data
));
mysql_query("update marketing set enviado='N' where id=".$row['id']);
}
*/
echo "ok";
?>

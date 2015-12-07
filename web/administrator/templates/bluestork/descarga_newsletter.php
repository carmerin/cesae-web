<?php
/**
 * Created by Netvision.es
 * User: alvaro
 * Date: 12/09/14
 * Time: 11:52
 */

//Coneccion a la Base de Datos
//$dbcnx = @mysql_connect("localhost", "cesaeDBuser", "6w~E:Qn|;B");
$dbcnx = @mysql_connect("localhost", "cesaemysql", "uo9726"); //server real cesae.es
//Seleciona base de datos
if (!$dbcnx) {
    echo( "no se conecta" );
}

//mysql_query("SET character_set_results = 'latin1', character_set_client = 'latin1', character_set_connection = 'latin1'", $dbcnx);

//Seleciona base de datos
//if (!@mysql_select_db("CesaeDB") ) {
if (!@mysql_select_db("cesaewebjoomla") ) { //server real cesae.es
    die( "no se conecta" );
}else{
//    die( "se conecta correctamente" );
}

$actual_link = $_REQUEST['actual_link'];

$counter=0;

//hacemos la consulta a la DB
$result = mysql_query("SELECT * FROM jiutn_newsletter WHERE activo='1'");
if (!$result) {
    echo("<p>Error performing query:"  . mysql_error() . "</p>");
    exit();
}

while( $row = mysql_fetch_array($result) ) {

    echo $row['email'] . ";" . $row['fecha_alta'].";\n";
    //die('aaaaaaaaaa');
}

//print_r($result);
//die();




    $filename = "export_newsletter_" . date('Y-m-d');
    $headers	= ''; // just creating the var for field headers to append to below
    $data	= ''; // just creating the var for field data to append to below
    $first_row	= true;
    //$obj	=& get_instance();


    if (count($result) == 0)
    {
        echo '<p>No hay registros en la tabla de newsletters.</p>';
    }
    else
    {
        foreach ($array as $row)
        {
            $line = '';
            foreach($row as $key=>$value)
            {
                //use the first row to get the columns
                if($first_row==true)
                {
                    $headers .= $key . "\t";
                }


                if ((!isset($value)) || ($value == ""))
                {
                    $value = "\t";
                }
                else
                {
                    $value = str_replace('"', '""', $value);
                    $value = '"' . $value . '"' . "\t";
                }
                $line .= $value;
            }
            $first_row=false;
            $data .= trim($line)."\n";
        }
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=$filename.csv");
        $data = str_replace("\r","",$data);
        echo "$headers\n$data";

        include($actual_link);
        die();
    }




?>
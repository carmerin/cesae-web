<?php
/**
 * Created by Netvision.es
 * User: alvaro
 * Date: 31/07/14
 * Time: 9:40
 */



    //se revisan las variables del formulario, comprobando primero nombre_principal que debe venir vacia, si no lo esta es por un robot o spambot
    if($_REQUEST['nombre_principal']==" " && $_REQUEST['caso']=='alta_newsletter'){

        //insertamos el resgitro en la DB
       //$dbcnx = @mysql_connect("localhost", "cesaeDBuser", "6w~E:Qn|;B"); //netivision.es
        $dbcnx = @mysql_connect("localhost", "cesaemysql", "uo9726"); //server real cesae.es

        //Seleciona base de datos
        if (!@mysql_select_db("CesaeDB") ) {
            echo( "no hay conexion" );
            die();
        }else{
            echo "tas conectado";
//            die();
        }

        //comprobamos que el email ha sido enviado
        if(isset($_REQUEST['email'])){
            $email_alta = $_REQUEST['email'];
        }

        //comprobamos si ese email ya esta dado de alta
        $result = mysql_query("SELECT email FROM jiutn_newsletter WHERE email='$email_alta'");
        $query_row=mysql_fetch_array($result);
        //echo($query_row['email']);
//        die();

        if(mysql_num_rows($result) == 0){   //si no hay resultado insertamos el registro en la DDBB y enviamos el email de confirmación al usuario

            $sql = "INSERT INTO jiutn_newsletter VALUES ( '0', '$email_alta', NOW(), '0')";
            if (@mysql_query($sql)) {

                //si hay insert correcto se envia el email al usuario
                $email				=strip_tags($_POST['email']);
                //declaracion de variables con los valores provenientes del formulario de contacto le quitamos el posible codigo maligno con strip_tags() //
                $email				=utf8_decode($email);
                //Se envia el email al usuario con PHPmailer
                include("libraries/phpmailer/phpmailer.php");

                $mail = new PHPMailer(); // defaults to using php "mail()" //instantiate
                //$mail->PluginDir = "phpmailer/";
                //$mail->SetLanguage  ("es","phpmailer/language/");
                $mail->IsSMTP();   // send via SMTP
                //$mail->SMTPDebug = 2;
                //$mail->SMTPKeepAlive = true;
                $mail->Mailer = "smtp";
                $mail->Host  = "mail.netvision.es"; // SMTP servers
                $mail->SMTPAuth = true;     // turn on SMTP authentication

                $mail->Username = "alvaro.grillet@netvision.es";  // SMTP username
                $mail->Password = "NVpwdAL2013"; // SMTP password

                $mail->From       = "info@cesae.es";
                $mail->FromName   = "Confirmacion de alta en servicio de newsletter";

                $mail->AddAddress($email);
    //        $mail->AddAddress("alvaro.grillet@zonanv.com");
                $mail->IsHTML(true);

                $mail->Subject    = "Confirmación de alta en el sistem de newsletter de CESAE.es";

                $mail->Body     =  "<div style='width:550px; height: auto; padding:20px; border:1px solid #ccc; background-color: #fff; font-family: Verdana, Arial, Tahoma; font-size: 12px; color: #333; text-align: justify;'>
                                    <img src='http://cesae.es/images/logo-js.png' alt='' border='0' /><br><br>
                                    Por favor confirme su alta:<br><br>
                                    Correo electr&oacute;nico: <strong>" . $email .  "</strong><br><br>
                                    Ha recibido este email para verificar que ha sido usted quien se ha dado de alta en nuestro servicio de newsletter.<br /><br />
                                    Por favor confirme su alta aqui http://cesae.zonanv.com/?email_confirm=".$email."  <br /><br />
                                    Si no ha sido usted quien ha solicitad el alta, no haga caso de este correo y su suscripci&oacute;n no sera activada.<br /><br />
                                    Atentamente <strong>Cesae.es</strong>
                                </div>";



                //$mail->MsgHTML($body);


                if(!$mail->Send()){ //hace el envio del correo
                    echo "<font color=red>El correo no pudo enviarse a por favor intentelo de nuevo en unos segundos.</font><br>";
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }else{


                }

                //fin del envio del email al usuario


            } else {
                //echo("Error añadiendo el registro:"  .   mysql_error() . "El formulario no ha podido ser enviado por favor inténtelo de nuevo");
            }
            header('Location: http://cesae.zonanv.com?SEND' );


        }//fin del if de que cuenta los resultados

    }else{
        header('Location: http://cesae.zonanv.com/?KOSEND' );
    }

?>
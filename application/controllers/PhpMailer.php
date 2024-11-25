
<?php

class PhpMailer extends CI_Controller
{
    public function __construct() {
		parent::__construct();
		$this->load->library('PhpMailerLib');
	}
    
    public function SendMail(){

        $mail = $this->phpmailerlib->getinstance();
        try {
            //Configuracion de phpmailer para enviar correos
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   =  true;
            $mail->Username   = 'tunjafet97@gmail.com';
            $mail->Password   = 'dqsd ayyj uljp rmcq'; // contraseña para aplicaciones de google (propia)
            $mail->SMTPSecure =  PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Configuración del correo
            $mail->setFrom('tunjafet97@gmail.com', 'Cytisum');
            $mail->addAddress('tunjafet97@gmail.com');
            $mail->Subject = 'Prueba de envio de correo chaval';
            $mail->isHTML(true);
            $mail->Body    = 'Este es el cuerpo del mensaje. 
            <a href="localhost/Landing/">Click aqui</a>';
           // $mail->addAttachment('/ruta/al/archivo/adjunto'); //Para adjuntar archivos
            $mail->send();
            $this->load->view('enviarCorreo');
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }

    }
}

?>
<?php
// ----------- DATABASE CONSTANTS -------------------
define('IS_ONLINE', false);
define('DB_SERVER', 'localhost');
define('DB_USERNAME_LOCALHOST', 'localhost');
define('DB_PASSWORD_LOCALHOST', 'root');
define('DB_DATABASE_LOCALHOST', 'root');
define('DB_USERNAME_ONLINE', '');
define('DB_PASSWORD_ONLINE', '');
define('DB_DATABASE_ONLINE', '');
define('UTF_8', "UTF-8");
// -----------------------------------------------
// ----------- DATABASE MAIN FUNCTIONS -----------
function getDataFromDB ($query){
	$conn = dbConect();
	$result = mysqli_query ($conn, $query);
	mysqli_close ($conn);
	return $result;
}

function setDataInDB ($query){
	$conn = dbConect();
	mysqli_query ($conn, $query);
	mysqli_close ($conn);
}

function htmlDecode ($string){
	return html_entity_decode($string, ENT_QUOTES, UTF_8);
}

function htmlEncode ($string){
	return htmlentities($string, ENT_QUOTES, UTF_8);
}

function dbConect(){
	if (!IS_ONLINE) {
		$conn = mysqli_connect(DB_SERVER, DB_USERNAME_LOCALHOST, DB_PASSWORD_LOCALHOST, DB_DATABASE_LOCALHOST);
	} else {			
		$conn = mysqli_connect(DB_SERVER, DB_USERNAME_ONLINE, DB_PASSWORD_ONLINE, DB_DATABASE_ONLINE);
	}
	mysqli_set_charset($conn, UTF_8);
	return $conn;
}
// --------------------------------------------------

// ---------- DATABASE QUERIES ----------------------

// --------------------------------------------------

// ---------- PHP MAILER ----------------------------
// TO - DO
function sendEmail($emailFrom, $emailAppName, $emailTo, $emailToName, $emailSubject, $emailBody){
	$isOk = 0;
	
	global $enviarenSMTP, $hostMail, $userNameMail, $passwordMail, $portMail;
	require_once($_SERVER["DOCUMENT_ROOT"].'/comun/PHPMailer/PHPMailer-5.2-stable/PHPMailerAutoload.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/comun/PHPMailer/PHPMailer-5.2-stable/class.phpmailer.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/comun/PHPMailer/PHPMailer-5.2-stable/class.smtp.php');
	
	$mail = new PHPMailer();
	if ($enviarenSMTP) {
		//SMTP validation
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Mailer = "smtp";
		$mail->Host = $hostMail; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
		$mail->Username = $userNameMail; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
		$mail->Password = $passwordMail; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
		$mail->Port = $portMail; // Puerto de conexión al servidor de envio. 
		$mail->From = $emailTiendaNombre; // A RELLENAR Desde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
		$mail->FromName = $emailTiendaNombre; //A RELLENAR Nombre a mostrar del remitente. 
		$mail->IsHTML(true); // El correo se envía como HTML 
	}

	$mail->SetFrom($emailFrom, $emailTiendaNombre);
	$mail->AddReplyTo($emailFrom, $emailTiendaNombre);
	$mail->AddAddress($emailTo, $emailToNombre);
	//$mail->AddBCC('marketing@ofifacil.com', 'OFIFACIL'); 
	if ($enviarenSMTP) {
		$mail->Subject = $emailSubject.' smtp';
	} else {
		$mail->Subject = $emailSubject;
	}
	$mail->MsgHTML($emailBody);
	//add attached file
	//$mail->AddAttachment("ruta/archivo_adjunto.gif");

	if($mail->Send()) { $isOk = 1; }
	return $isOk;
}
// --------------------------------------------------
?>
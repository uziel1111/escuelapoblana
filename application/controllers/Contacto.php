<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->library('My_PHPMailer');
		}

		public function set_reporte_escuelas_particulares()
		{
			$action = $this->input->post('action');
			switch ($action) {
	         case 'reporte':
	            //  $to="escuelasparticulares@puebla.gob.mx";
	            // $to="buzon.sugerencias@escuelapoblana.org";
	             $to = "escuelasparticulares@puebla.gob.mx";
	             $obj_mail = new PHPMailer;

					     $obj_mail->SetFrom("buzon.sugerencias@escuelapoblana.org", "www.escuelapoblana.org"); // Quien envia
							 $obj_mail->AddBCC("buzon.sugerencias@escuelapoblana.org");

	             $nombre   = $this->input->post('EP_modal_reporte_nombre');
							 $telefono   = $this->input->post('EP_modal_reporte_telefono');
							 $emaill   = $this->input->post('EP_modal_reporte_email');
							 $nomb_esc   = $this->input->post('EP_modal_reporte_nombree');
	             $dir_esc  = $this->input->post('EP_modal_reporte_direccione');
	             $asunto   = $this->input->post('EP_modal_reporte_motivo');
	             $mensaje  = $this->input->post('EP_modal_reporte_mensaje');
	             $archivo  =  $_FILES['EP_modal_reporte_archivo']['tmp_name'];

	             $adjunto_nombre      = $_FILES['EP_modal_reporte_archivo']['name'];
	             $adjunto_tmpname     = $_FILES['EP_modal_reporte_archivo']['tmp_name'];

	             $respuesta = "ok";
	            //  $obj_mail->From = "mhernandez@escuelapoblana.org";
	            //  $obj_mail->From="buzon.sugerencias@escuelapoblana.org";
	             $obj_mail->addAddress($to);
	             $obj_mail->Subject=$asunto; //ASUNTO
	             $obj_mail->IsHTML(true);
	             $obj_mail->Body = '<strong>' .$nombre.'</strong> quien tiene el correo <strong>'.$emaill.'</strong> y cuyo teléfono de contacto es <strong>'.$telefono.'</strong>
	             le ha contactado desde la web <b>http://escuelapoblana.org/escuelas_particulares</b>
	             para levantar una reporte de la escuela que el emisor identifica como <strong>'.$nomb_esc.'</strong> y con domicilio <strong>'.$dir_esc.'</strong> con el siguente mensaje: <br><p>'.$mensaje.'</p>';
	             $obj_mail->AddAttachment($adjunto_tmpname, $adjunto_nombre);

	             $obj_mail->CharSet ='UTF-8';
	             $exito = $obj_mail->send();

	             if (!$exito) {
	               $respuesta = "error";
								//  echo $obj_mail->ErrorInfo; die();
	             }

							Utilerias::enviaDataJson(200, $respuesta, $this);
				 			exit;

	         break;
	          case 'otro':
	          break;
	      }# switch

			// $data = array();
			// Utilerias::pagina_basica($this, "estadistica/estad_indi_generales", $data);
		}




}

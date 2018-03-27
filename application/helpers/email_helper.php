<?php 	
    function send_email($from,$to,$subject,$html)
    {
    	 // Get current CodeIgniter instance
    	$CI =& get_instance();
    	/*$CI->load->library('email');
    	$CI->load->library('ion_auth');
		$CI->load->library("Emogrifier");
		$CI->emogrifier->setHtml($html);
		$css = $CI->load->view($CI->config->item('email_templates', 'ion_auth').$CI->config->item('email_forgot_password_complete_css', 'ion_auth'), array(), true);
		$CI->emogrifier->setCss($css);
		$message= $CI->emogrifier->emogrify();
		echo $message;
    	$config['mailtype'] = $CI->config->item('email_type', 'ion_auth');
		$CI->email->initialize($config);
		$CI->email->set_newline("\r\n");
		$CI->email->from($from);
		$CI->email->to($to);
		$CI->email->subject($CI->config->item('site_title', 'ion_auth') . ' '.$subject);
		$CI->email->message($message);*/
		$CI->load->library("Emogrifier");
		// $html = '<html><h1>Hello world!</h1></html>';
$css = file_get_contents(CSS_PATH.'adminlte.css');
$css.= file_get_contents(CSS_PATH.'bootstrap/css/bootstrap.min.css');

$CI->emogrifier->setHtml($html);
$CI->emogrifier->setCss($css);
$message = $CI->emogrifier->emogrify();
d($message);
$CI->load->library('email');

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';


$CI->email->initialize($config);

$CI->email->from($from);
$CI->email->to($to);

$CI->email->subject('subject');
$CI->email->message($message);

$CI->email->send();

echo $CI->email->print_debugger();
/*$config['mailtype'] = $CI->config->item('email_type', 'ion_auth');
		$CI->email->initialize($config);
		$CI->email->set_newline("\r\n");
		$CI->email->from($from);
		$CI->email->to($to);
		$CI->email->subject($CI->config->item('site_title', 'ion_auth') . ' '.$subject);
		$CI->email->message($message);
		$CI->email->send();*/

		/*if ($CI->email->send())
		{
			//$this->set_message('forgot_password_successful');
			return TRUE;
		}
		else
		{
			//$this->set_error('forgot_password_unsuccessful');
			return FALSE;
		}*/
}
?>
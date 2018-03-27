<?php
class MY_Controller extends CI_Controller {

	public function __contruct()
		{
			parent::__contruct();

		} 
    protected $header_file = 'common/header';
    protected $body_file;
    protected $footer_file = 'common/footer';
    protected $header_vars = array();
    protected $body_vars = array();
    protected $footer_vars = array();
 
    public function _remap($method, $params = array())
    {
		$this->load->helper('assets_helper');
		//create an array of css files
		$arr_css=array(
			'bootstrap/css/bootstrap.min.css',
			'font-awesome/css/font-awesome.min.css',
			'data-tables/css/dataTables.bootstrap.min.css',
			'data-tables/css/dataTables.checkboxes.css',
			'datepicker/css/datepicker.css',
			/*'adminlte.css',*/
			'adminlte.css',
			'skins/_all-skins.min.css',
			'select2.css',
			'jquery-ui.css',
			'notify-metro.css',
			'sweetalert2.min.css',
			'animate.css',
			'bootstrap2-toggle.min.css',
			'custom.css'
			);
		
		//create an array of js files
		$arr_js=array(
			'jquery-ui.js',			
			'bootstrap.min.js',
			'app.min.js',
			'select2.full.js',
			'jquery.dataTables.min.js',
			'bootstrap-datepicker.js',
			'dataTables.bootstrap.min.js',
			'jquery.validate.min.js',
			'notify.js',
			'notify-metro.js',
			'jQuery.print.js',
			'jquery.confirm.min.js',
			'jquery.mask.min.js',
			'jquery.bootstrap.newsbox.min.js',
			'sweetalert2.min.js',
			'bootstrap-toggle.min.js',
			'custom.js'
			);

		//assign all css to any array variable
		$this->header_vars['css'] = load_css($arr_css);

		//assign all js to any array variable
		$this->footer_vars['js'] = load_js($arr_js);
		
		
        // you can set default variables to send to the template here
		
		//$this->body_file = strtolower(get_class($this)).'/'.$method;
        $this->body_file = $method;
        if (method_exists($this, $method))
        {
            $result = call_user_func_array(array($this, $method), $params);
            $this->load->view($this->header_file, $this->header_vars);
            $this->load->view($this->body_file, $this->body_vars);
            $this->load->view($this->footer_file, $this->footer_vars);
            
            return $result;
        }
		else
		{
        	show_404();
		}
    }
}
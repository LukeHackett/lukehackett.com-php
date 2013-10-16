<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* The controller that all other controllers extend from.
* It provides common functions and allows variables to be instantiated for 
* use in the controllers.
*
* @author Gary Mardell, Luke Hackett
*/
class MY_Controller extends CI_Controller {

  // Class variable used to store the template 
  protected $layout;
  // Variable used to store the data which is passed to the loaded view
  protected $data;
  // Whether a request is ajax or not
  protected $ajax = FALSE;

  private $_definitions = array();
    
  public function __construct($theme) {
    parent::__construct();  
    
    if($theme == "main"){
      // Load CSS
      $this->carabiner->css('bootstrap.min.css');
      $this->carabiner->css('main.css');
      
      // Load JS
      $this->carabiner->js('jquery.min.js');
      $this->carabiner->js('bootstrap.min.js');
      $this->carabiner->js('global.js');
    }

    if($theme == "simple"){
      // Load CSS
      $this->carabiner->css('jquery.fullPage.css');
      $this->carabiner->css('simple.css');

      // Load JS
      $this->carabiner->js('jquery.min.js');
      $this->carabiner->js('jquery-ui.min.js');
      $this->carabiner->js('jquery.fullPage.min.js');
      $this->carabiner->js('d3.min.js');
      $this->carabiner->js('d3.layout.cloud.js');
    }
        
    // Determining if the request was made by ajax or not 
    $this->ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');    
    $this->data['ajax'] = $this->layout['ajax'] = $this->ajax;
    
  }

  public function AddDefinition($Term, $Definition = NULL) {
    if(!is_null($Definition)) {
         // Make sure the term is a valid id.
         if (!preg_match('/[a-z][0-9a-z_\-]*/i', $Term))
            return FALSE;

         $this->_definitions[$Term] = $Definition;
      }
      return TRUE;
  }

  public function GetDefinitions() {

    if (!array_key_exists('Base_Url', $this->_definitions))
      $this->_definitions['Base_Url'] = base_url();

    $Ret = '<div id="Definitions" style="display: none">';
    foreach($this->_definitions as $Term => $Definition) {
      $Ret .= '<input type="hidden" id="'.$Term.'" value="'.$Definition.'" />'."\n";
    }
    return $Ret.'</div>';
  }

  /**
  * This function renders the view into a layout or ommits the layout if the
  * request was from ajax
  * @param string $ViewName The name of the view to load
  * @param string $layout The layout to load the view in, defaults to 'layout/global'
  */
  protected function Render($ViewName = '', $layout = '') {
    $this->layout['definitions'] = $this->GetDefinitions();
    $this->layout['content'] = $this->load->view($ViewName, $this->data, TRUE);
    $this->load->view($layout, $this->layout);   
  }
  
}
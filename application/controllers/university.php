<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class University extends MY_Controller {

  /**
   * Default Constructor
   */
  function __construct()
  {
    parent::__construct();
    $this->load->model('University_Model', 'university');
    $this->carabiner->js('grades.js');
  }

  /**
   *  Default Index Page for the University controller.
   */
  public function index()
  {
    $this->data["active"] = "";
    $this->render('university/index', 'university/layout');
  }

  /**
   * University => Year One 
   */
  public function yearone()
  {
    $this->get_data(1);
    $this->render('university/year', 'university/layout');
  }

  /**
   * University => Year Two 
   */
  public function yeartwo()
  {
    $this->get_data(2);
    $this->render('university/year', 'university/layout');
  }

  /**
   * University => Year Three 
   */
  public function yearthree()
  {
    $this->get_data(3);
    $this->render('university/year', 'university/layout');
  }

  /**
   * University => Year Four 
   */
  public function yearfour()
  {
    $this->get_data(4);
    $this->render('university/year', 'university/layout');
  }

  /**
   * University => Year Five 
   */
  public function yearfive()
  {
    $this->get_data(5);
    $this->render('university/year', 'university/layout');
  }

  /**
   * Method to setup the main data objects in order to display each of the 
   * main pages within the University controller.
   */
  private function get_data($year)
  {
    $this->data['active'] = $year;
    $this->data['year'] = $year;
    $this->data['modules'] = $this->university->get_modules($year);
    $this->data['assessments'] = $this->university->get_assessments($year);
    $this->data['jumbo_header'] = $this->university->get_jumbo_header($year);
    $this->data['jumbo_lead'] = $this->university->get_jumbo_lead($year);
  }

}
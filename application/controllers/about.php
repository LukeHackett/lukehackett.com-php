<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller {

	/**
	 * Default Constructor
	 */
	function __construct()
  {
    parent::__construct("main");
    $this->data["active"] = "about";
  }

  /**
   * About => Huddersfield 
   */
	public function huddersfield()
	{
	  $this->render('about/huddersfield', 'university/layout');
	}
	
	/**
   * About => Course 
   */
	public function course()
	{
	  $this->render('about/course', 'university/layout');
	}
	
	/**
   * About => Me 
   */
	public function me()
	{
	  $this->render('about/me', 'university/layout');
	}
}
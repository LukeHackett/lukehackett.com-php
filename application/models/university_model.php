<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class University_Model extends CI_Model {

  /**
   * Default Constructor
   */
  function __construct()
  {
    parent::__construct();
  }
  
  /**
   * This function will return the maximum year
   */
  public function get_maximum_year()
  {
    return $this->db->select_max('year')
                    ->get('Modules')
                    ->first_row()->year;
  }
  
  /**
   * This function returns whether or not the given year is the maximum year
   */
  public function is_maximum_year($year)
  {
    $max_year = $this->get_maximum_year();
    return ($year == $max_year) ? TRUE : FALSE;    
  }
  
  /**
   * This function returns all modules within the given year.
   */
  public function get_modules($year)
  {
    return $this->db->select("Modules.id, name, tutor, code, specification, Modules.description")
                    ->join('Years', 'Years.id = Modules.year_id', 'inner')
                    ->get_where('Modules', array('year_num' => $year))
                    ->result();
  }
  
  /**
   * This function returns all the assessments within a given year
   */
  public function get_assessments($year)
  {
    $modules = $this->get_modules($year);
    
    $assessment = array();
    $i = 0;
    foreach($modules as $module)
    {
      $assessment[$i] = $module;
      $assessment[$i]->module_grade = $this->calculate_module_grade($module->id);
      $assessment[$i]->module_result = $this->grade_to_result($assessment[$i]->module_grade);
      // Add the Graded Result, e.g. 78 = A.
      $result = $this->db->order_by("type", "asc")
                         ->get_where('Assessments', array('module_id' => $module->id))
                         ->result();

      for ($j = 0; $j < count($result); $j++)
      {
        $result[$j]->result = $this->grade_to_result($result[$j]->grade);
      }
      $assessment[$i]->assessment = $result;
            
      $i++;
    }
    return $assessment; 
  }
  
  public function get_jumbo_header($year)
  {
    return $this->db->select('year_text')
                    ->get_where('Years', array('year_num' => $year))
                    ->first_row()->year_text;
  }
  
  public function get_jumbo_lead($year)
  {
    return $this->db->select('description')
                    ->get_where('Years', array('year_num' => $year))
                    ->first_row()->description;    
  }
  
  private function calculate_module_grade($module_id)
  {
    $results = $this->db->select('weight, grade')
                        ->get_where('Assessments', array('module_id' => $module_id))
                        ->result();
    $grade = 0;
    foreach($results as $result)
    {
      $grade = $grade + ($result->weight / 100) * $result->grade;
    }
    return ceil($grade);
  }
  
  private function grade_to_result($grade)
  {
    if ($grade >= 70)
    {
      return "A";
    }
    else if ($grade >= 60)
    {
      return "B";
    }
    else if ($grade >= 50)
    {
      return "C";
    }
    else if ($grade >= 40)
    {
      return "D";
    }
    else if ($grade == NULL)
    {
      return "N/A";
    }
    else
    {
      return "FAIL";
    }
  }
  
}
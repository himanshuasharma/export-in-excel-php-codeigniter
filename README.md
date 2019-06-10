# Export in excel - For PHP ( Codeigniter) 
An library for export data in excel format  

Location : In www.example.com/application/libraries/Export.php

How to call:
First import(load) The library then use the method to_excel();

For Codeignier : 

example 
public function example() // function inside the controller 
{
      $this->load->library('export');
      $this->load->model('general_model','general'); // its a model from where we are getting all the data to listout
      $input = $this->general->get_all_data(); 
      $this->export->to_excel($array, 'excel_01012019');
}

it will directly download the file.

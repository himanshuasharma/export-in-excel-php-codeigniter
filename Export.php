<?php

/**
 * Library to export data in perticular formate like excel
 * @author Himanshu Sharma
 * @contact learndphere@gmail.com
 *
 * NOTE: Please put this file in library directory 
 */
class Export
{
	/*
	* Export in excel format
	* input: 
	*		$input_array: input_array array of array of data // for creating header also
	*		$filename: name of file in which you want to store default will be datetime.xslt_set_sax_handler(xh, handlers)
	* Output: None 
	* when you will call it will directly export the excel
	*/
	public function to_excel($input_array=null, $filename = null)
	{
		if (!is_array($input_array))
			return 'input must be array of data';

		if (!empty($filename))
			$filename = 'EXCEL_'.date('ymdhis');
			// return 'Filename without extension is required for export data';

		header('Content-Disposition: attachment; filename='.$filename.'.xls');
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');
		print "\xEF\xBB\xBF"; // UTF-8 BOM

		$content  = array();

		/* To get header of the excel */
		foreach ($input_array as $sub_key => $sub_value)
			foreach ($sub_value as $key => $value)
				if(!in_array($key, $content))
					$content = $key;

		echo "<table>";
			// Table header
			echo "<tr>";
			foreach ($content as $sub_content) {
				$sub_content = ucfirst($sub_content);
				echo "<th>".$sub_content."<th>";
			}
			echo "</tr>";

			// table content
			foreach ($input_array as $sub_key => $sub_value){
				echo "<tr>";
				foreach ($sub_value as $key => $value){
					echo "<td>".$value."<td>";
				}
				echo "</tr>";
			}

		echo "</table>";
	}	
	
}

/*
How to call
	example for codeigniter 

	
	public function example() // function inside the controller 
	{
		$this->load->library('export');
		$this->load->model('general_model','general'); // its a model from where we are getting all the data to listout
		$input = $this->general->get_all_data(); 
		$this->export->to_excel($array, 'excel_01012019');
	}

*/

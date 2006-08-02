<?php
/**
* Base Field Class
*
* Used to create individual fields on a form
*
* @author Nick DeNardis <nick@design-man.com>
*/
class Field {
	/**
	* @var string 
	*/
	var $name;
	/**
	* @var int 
	*/
	var $max_length;
	/**
	* @var int 
	*/
	var $numeric;
	/**
	* @var int 
	*/
	var $blob;
	/**
	* @var string 
	*/
	var $type;
	/**
	* @var int 
	*/
	var $length;
	/**
	* @var string 
	*/
	var $label;
	/**
	* @var string 
	*/
	var $example;
	/**
	* @var various 
	*/
	var $value;
	
	function Field($data){
		// Make sure the data for the form fields is in an array
		if (is_array($data)){
			// Loop through all the fields
			foreach($data as $key=>$data){
				// Setup the form fields
				
			}
		}
	}
}

/**
* Base Class for Froms, checks the REQUIRED ARRAY
*
* @author Nick DeNardis <nick@design-man.com>
*/
class Form {
	/**
	* @var array 
	*/
	var $required;
	/**
	* @var array 
	*/
	var $error;
	/**
	* @var array 
	*/
	var $fields;
	
	/**
	* Class Constructor
	*
	* Creates a Form Class with all the information to use the Form functions
	*
	* @param array, array, string, array
	* @return NULL
	*/
	function Form($data){
	
	}
	
	/**
	* Check the Data from the class
	*
	* @return array
	*/
	function CheckRequired(){
		if (is_array($this->required)){
			while ( list($key,$data) = each($this->required) ){
				switch ($data){
					case 'email':
						if ( isset($this->fields[$data]->value) && !ereg("^[a-zA-Z0-9_\.-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,4}$", $this->fields[$data]->value) )
							$this->error[$data] = 'The Email address you entered is not valid (username@domain.com), Please try again.';
						break;
					case 'wsu_phone':
						if ( isset($this->fields[$data]->value) && !ereg("^[0-9]+-[0-9]{4}$", $this->fields[$data]->value) )
							$this->error[$data] = 'The Phone number you entered is not valid (123-457-1234), Please try again.';
						break;
					default:
						if (!isset($this->fields[$data]->value) || (string)$this->fields[$data]->value == '')
							$this->error[$data] = 'The ' . (($this->fields[$data]->label == '')?ucfirst(str_replace('_', ' ' , $data)):$this->fields[$data]->label) . ' field is required, Please try again.';
						break;
				}
			}
		}
		
		return $this->error;
	}
	
	/**
	* Get Value
	*
	* Get the value of a field
	*
	* @return MIXED
	*/
	function GetValue($field){
		// Make sure there is fields and return the value
		if (is_array($this->fields))
			return $this->fields[trim($field)]->value;
	}
	
	/**
	* Set Value
	*
	* Set the value of a field
	*
	* @return BOOL
	*/
	function SetValue($field,$value){
		// Make sure there is fields
		if (is_array($this->fields)){
			$this->fields[trim($field)]->value = $value;
			return true;
		}
		
		return false;
	}
	
	/**
	* Get Fields
	*
	* Get a list of all the fields in the database
	*
	* @return array
	*/
	function GetFields(){
		// Make sure there is fields and return the value
		if (is_array($this->fields)){
			$list = array();
			foreach($this->fields as $key=>$data)
				$list[] = $data->name;
			return $list;
		}
		
		return 0;
	}
	
	function DisplayForm($display='', $hidden=array(), $options=array()){ 
		// Rearrange the Fields if there is a custom display
		$show = array();
		if(is_array($display)){
			// If there is a custome Display make the array
			foreach($display as $key=>$data)
				$show[$data] = ($this->fields[$data]->label != '')?$this->fields[$data]->label:ucfirst(str_replace('_',' ',$data));
			
			// Loop through all the fields to find orphans and add them to the hidden array so we dont loose data
			if (is_array($this->fields))
				foreach($this->fields as $key=>$data)
					if (!array_key_exists($key,$show) && !in_array($key,$hidden))
						$hidden[] = $key;
		}else{
			// If there is fields in the db table make the show array
			if (is_array($this->fields))
				foreach($this->fields as $key=>$data){
					if (!in_array($key,$hidden))
						$show[$key] = ($data->label != '')?$data->label:ucfirst(str_replace('_',' ',$key));
				}
		}
		
		// Start the Fieldset
		echo '<fieldset><legend>Information</legend>' . "\n";
		
		// Show all the Visible Fields
		foreach($show as $key=>$field){
			// If the field is not in the hidden array
			if (!in_array($key,$hidden)){
				// Create the Field Div with the example, label and error if need be
				echo '<div>' . (($this->fields[$key]->example != '')?'<div class="example"><p>' . stripslashes($this->fields[$key]->example) . '</p></div>':'') . '<label for="' . $key . '">' . ((in_array($key,$this->required))?'<em>*</em>':'') . $field . ':</label>' . (($this->error[$key] != '')?'<div class="error">':'');
				
				// If there is specialty options
				if ($options[$key] != ''){
					// Start the Select Box
					echo '<select name="' . $key . '" id="' . $key . '">' . "\n";
					// Loop though each option
					foreach($options[$key] as $opt_key=>$opt_value){
						echo "\t" . '<option value="' . $opt_key . '"' . (($this->fields[$key]->value == $opt_key)?' selected="selected"':'') . '>' . stripslashes($opt_value) . '</option>' . "\n";
					}
					// End the Select Box
					echo '</select><br />' . "\n";
				}elseif($this->fields[$key]->type == 'blob'){
					// If it is a blob or text in the DB then make it a text area
					echo '<textarea name="' . $key . '" id="' . $key . '" cols="50" rows="4">' . stripslashes($this->fields[$key]->value) . '</textarea><br />' . "\n";
				}elseif($this->fields[$key]->type == 'date'){
					// Create the Javascript Date Menu
					echo '<span id="cal_' . $key . '"></span>';
					echo '<script type="text/javascript">';
					echo 'createCalendarWidget(\'' . $key . '\',\'NO_EDIT\', \'ICON\',\'' . WS_SIMPL . WS_SIMPL_IMAGE . 'cal.gif\');';
					if ($this->fields[$key]->value != '')
						echo 'setCalendar(\'' . $key . '\',' . date("Y,n,j",strtotime($this->fields[$key]->value)) . ');';
					echo '</script>';
				}else{
					// Set the display size, if it is a small field then limit it
					$size = ($this->fields[$key]->length <= 30)?$this->fields[$key]->length:30;
					// Display the Input Field
					echo '<input name="' . $key . '" id="' . $key . '" type="text" size="' . $size . '" maxlength="64" value="' . stripslashes($this->fields[$key]->value) . '" />';
				}
				// If there is an error show it and end the field div
				echo (($this->error[$key] != '')?'<p>' . stripslashes($this->error[$key]) . '</p></div>':'') . '</div>' . "\n";
			}
		}
		
		// Make all the Hidden Fields
		foreach($hidden as $field)
			echo '<input name="' . $field . '" type="hidden" value="' . stripslashes($this->fields[$field]->value) . '" />' . "\n";
		
		// End the Fieldset
		echo '</fieldset>' . "\n";
	}
}
?>
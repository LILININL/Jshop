<?php
   $db = new mysqli('localhost', 'root' ,'', 'inventory');
	if(!$db) {
	
		echo 'Could not connect to the database.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $db->query("SELECT customer_name FROM customer WHERE customer_name LIKE '$queryString%' LIMIT 50");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill(\''.addslashes($result->customer_name).'\');">'.$result->customer_name.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'มีปัญหากลับไปแก้ :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'อย่าให้ script! ครอบงำ!!!';
		}
	}
?>
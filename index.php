<?php

if(isset($_POST['submit']))
 {
    $url = $_POST['url'];
	$check = substr($url,0,7);
	$temp = "http://";
	
	if($check != "http://")
	{
	$url = $temp.$url;
	}
	
	
	      $upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ" ;
		  $lower_case = "abcdefghijklmnopqrstuvwxyz" ;
		  $numbers = "0123456789";
		  
		  $upper_case_shuffle = str_shuffle($upper_case);
		  $lower_case_shuffle = str_shuffle($lower_case);
		  $numbers_shuffle = str_shuffle($numbers);
		  
		  $upper_case_new = substr($upper_case_shuffle,0,2);
		  $lower_case_new = substr($lower_case_shuffle,0,2);
		  $numbers_new = substr($numbers_shuffle,0,2);
		  
		  $mixed = "$upper_case_new$lower_case_new$numbers_new" ;
		  $mixed_shuffle = str_shuffle($mixed);
		  
		  if(is_dir($mixed_shuffle))
		  {
		      $error = "Error please try again" ;
		  }
		  else
		  {  mkdir($mixed_shuffle);
		     $file_path = dirname(__FILE__)."/$mixed_shuffle/index.php" ;
			 $index = fopen($file_path,'w');
			 $data = '<?php header("location:'. $url.'");?>';
			 fwrite($index,$data);
			 fclose($index);
			 
			 $new_url = "Your new URL<br>http://127.0.0.1/$mixed_shuffle";
			 
			 
		  }
	

}

?>
<html>
<h2> Enter a url </h2>
<form action="index.php" method="POST">
     <input type="text" name="url" value="" size="50"><br>
	 <input type="submit" name="submit" value="Submit">
	 
</form>

</html>
<?php

if(isset($error))
{ 
  echo $error;
}
if(isset($new_url))
 {
     echo $new_url;
 }
?>
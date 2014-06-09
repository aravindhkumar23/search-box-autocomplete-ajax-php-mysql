<?php
	include("config.php");
	//$con=mysqli_connect("localhost","root","aravindh","aravindh");
	//echo "hi";
	$keyword = $_POST['data'];	
	//$keyword="lesu";
	//echo $keyword;
	$sql = mysqli_query($con,"SELECT name FROM test WHERE name like '".$keyword."%'");
	
	/*while($row = mysqli_fetch_array($sql))
	{
		echo "hi";
		echo $row['name'];
	}*/
	if(mysqli_num_rows($sql))
	{		
		echo '<ul class="list">';
		while($row = mysqli_fetch_array($sql))
		{					
			$str = strtolower($row['name']);
			$start = strpos($str,$keyword); 
			$end   = similar_text($str,$keyword); 
			$last = substr($str,$end,strlen($str));
			$first = substr($str,$start,$end);
			
			$final = '<span class="bold">'.$first.'</span>'.$last;
		
			echo '<li><a href=\'javascript:void(0);\'>'.$final.'</a></li>';
		}
		echo "</ul>";
	}
	else
		echo "<br>not found";
?>	   

<?php

// $isFilemaker = preg_match('/Filemaker/i',$_SERVER['HTTP_USER_AGENT']);
$browser = '';
if( isset($_GET['b']) ) $browser = $_GET['b']; // fmp

if ( $browser == 'dev' ) {
	
	$jsonFile = 'data.json';
	
	if (file_exists($jsonFile)) {
		$jsonData = file_get_contents($jsonFile);
	
		if ($jsonData !== null) {
			// return $jsonData;
		} else {
			$jsonData = '[]';
		}
	} else {
		$jsonData = '[]';
	}
	
}elseif ( $browser == 'fmp' ){ 
		
		$jsonData = "'*|DATA|*'"; 
		
		if ($jsonData !== null) {
			// return $jsonData;
		} else {
			$jsonData = '[]';
		}
				
}else{
	
	echo 'url "browser" query variable missing/incorrect';
	exit;
}

// echo $method;
?>

<pre>
<?php echo $_SERVER['HTTP_USER_AGENT'].'<hr>' ?>  <!-- interesting the result based on how webviewer is loaded -->
<?php //echo $_SERVER['SERVER_PROTOCOL'].'<hr>' ?>
<?php //echo $_SERVER['SERVER_NAME'].'<hr>' ?>
</pre>
<?php
class ketech
{
	function ketech()
	{
		/*$allSet = $this->runquery( "SELECT", "*", "ketechset"  );
		$_SESSION['config']	=	$allSet[0];*/
	}
	function runquery( $qtype="",$scol = "",$tablename="",$sva = array(),$whe="",$extra = "" )
	{
		if($qtype == "SELECT") {
			 $sql = $qtype." ".$scol." FROM ".$tablename." ".$whe."";
			 /*echo $sql;
			 echo "<hr/>";*/
			 ##die();
			 $qry = mysql_query($sql);
			 if( $extra == "num_rows") {
				return mysql_num_rows($qry);
			 }
			 else {
			 	if( mysql_num_rows( $qry ) > 0 )
				{
					//$results = mysql_fetch_assoc($qry);
					while ( $row = mysql_fetch_assoc( $qry ) )
					{
						$rowa[] = $row;
					}
				}
				
				if( isset( $rowa ) ) {
				return $rowa;	
				}
			}					 
		}							  
									   
		if($qtype == "INSERT") {
			 foreach($sva as $k => $v) {
				$colf[] = trim($k);
				if( $v == "NOW()" )
				{
					$colv[] =  addslashes(trim($v));	
				}else
				{
					$colv[] = '"'.trim($v).'"';	
				}
			 }	
			$strf = implode(",",$colf);
			ltrim($strf,",");
			$strv = implode(",",$colv);
			ltrim($strv,",");
			$qer = $qtype.' INTO '.$tablename.'('.$strf.')VALUES('.$strv.')';
			/*echo $qer;
			die();*/
			
			$result = mysql_query($qer);
			$result	=	mysql_insert_id();
			return $result;
			}
		  if($qtype == "UPDATE") {
			foreach($sva as $k => $v) {
				$sup[] = trim($k)."=".trim('"'.$v.'"');
			}
			$svp = implode(",",$sup);
			ltrim($svp,",");
			$qer = ''.$qtype.' '.$tablename.' SET '.$svp.' '.$whe.'';
			/*echo $qer;
			die();*/
			$result = mysql_query($qer);
			}
	
		if($qtype == "DELETE") {
		$qer = "".$qtype." ".$scol." FROM ".$tablename." ".$whe."";	
		/*echo $qer;
		echo "<hr/>";*/
		//die();
		$result = mysql_query($qer);
		}
		if( $qtype == "ALTER") {
		$qer = "".$qtype." TABLE ".$scol." ".$tablename." ".$whe."";
		$result = mysql_query($qer);
		}
		//echo "<pre>"; print_r($_REQUEST);
		//echo $qer."<hr><hr>";
	}
	function imageresize($max_width,$max_height,$image){

		$dimensions=getimagesize($image);
		if( $dimensions[0] <= $max_width )
		{
			return "noChange";
		}
		$width_percentage=$max_width/$dimensions[0];
		$height_percentage=$max_height/$dimensions[1];
		if($width_percentage <= $height_percentage){

		$new_width=$width_percentage*$dimensions[0];

		$new_height=$width_percentage*$dimensions[1];

		}else{

		$new_width=$height_percentage*$dimensions[0];

		$new_height=$height_percentage*$dimensions[1];

		}

		

		$new_image=array($new_width,$new_height);

		return $new_image;

	}
	function createThumbnail($img, $imgPath, $suffix, $newWidth, $newHeight, $quality)
	{
		//echo "<pre>"; print_r($img); die();
		$path_info = pathinfo($img['name']);
		/*echo $path_info['extension'];
		die();*/
	  // Open the original image.
	  /*echo $img;
	  die();*/
		if ($path_info['extension'] == "png") {
	  		$original = imagecreatefrompng($img['tmp_name']) or die("Error Opening original (<em>$imgPath/$img</em>)");
		}else {
			$original = imagecreatefromjpeg($img['tmp_name']) or die("Error Opening original (<em>$imgPath/$img</em>)");
		}
			list($width, $height, $type, $attr) = getimagesize($img['tmp_name']);
			 // Resample the image.
			$tempImg = imagecreatetruecolor($newWidth, $newHeight) or die("Cant create temp image");
			imagecopyresized($tempImg, $original, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) or die("Cant resize copy");		// Save the image.
			imagejpeg($tempImg, "$imgPath", $quality) or die("Cant save image");
			// Clean up.
			imagedestroy($original);
			imagedestroy($tempImg);
			return true;
	
	}
function delete_directory($dirname) {
	if (is_dir($dirname)){
	$dir_handle = opendir($dirname);
	}  
	if ( isset($dir_handle ) &&!$dir_handle){
	return false;
	}  
	while($file = readdir($dir_handle)) {
		if ($file != "." && $file != "..") {
			if (!is_dir($dirname."/".$file)){
				unlink($dirname."/".$file);
			}else{
				$this->delete_directory($dirname.'/'.$file);
			}    
		}
	}
closedir($dir_handle);
rmdir($dirname);
return true;
}
function paginate( $path,$hold ) {
	if( ( $hold%25 ) == 0 ){
		$total = $hold/25;
	}
    else {
    	$total = ($hold/25)+1;
     }
	 $returnp =   '<ul class = "pagination">';
	 if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid']>1 ) {
	 	$pre = $_REQUEST['vid']-1;
		$returnp = $returnp.'<li><a href = "'.$path.'&vid='.$pre.'">Previous</a></li>';
	}
     for( $i = 1; $i <= $total; $i++ ) {
	 if( isset( $_REQUEST['vid'] ) &&  $_REQUEST['vid'] == $i ){
			$navstyle ='style ="background:#CCFFCC"';
		}else{
			$navstyle ="";
		} 
		$returnp = $returnp.'<li><a href = "'.$path.'&vid='.$i.'"' .$navstyle. '>'.$i.'</a></li>';
	 }
	if( isset( $_REQUEST['vid'] ) &&  $_REQUEST['vid']<=($total-1) && $_REQUEST['vid']!="" ) {
		$nex = $_REQUEST['vid']+1;
		$returnp = $returnp.'<li><a href = "'.$path.'&vid='.$nex.'">Next</a></li>';
	}
	$returnp = $returnp.'</ul>';
	return $returnp;
}
}
?>
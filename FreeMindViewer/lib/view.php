<?php 
if(!empty($_FILES)){
	header('Content-type: text/xml');
	if($_FILES["file"]["type"]=="text/xml"||$_FILES["file"]["type"]=="application/octet-stream"){
		echo file_get_contents($_FILES["file"]["tmp_name"]);
	} else {
		echo "<root>fail</root>";
	}
} else{
	$data = $GLOBALS["HTTP_RAW_POST_DATA"];
	$id = uniqid();
	$link = "data/".$id.".mm";
	$out["data"] = $data;
	$out["id"] = $id;
	if(file_put_contents($link, $data)){
		$out['success'] = true;
	} else {
		$out['success'] = false;
	}
	echo json_encode($out);
}
?>
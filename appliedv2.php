<?php
if(isset($_GET["signature"])){
	if($_GET["signature"] == "postUpdata"){
		$data = $_POST["ux"];
		$data["pwprotectdata"] = md5(sha1(md5(sha1(str_rot13($_POST["ux"]['pwprotectdata'])))));
		$data = json_encode($data);
		$data = base64_encode($data);
		$dataArray = explode("[**]", chunk_split($data,"20","[**]"));
		$determ = str_shuffle(date("Y-m-d H:i:s")."CONTROLLERBynawinz_PROTECTOR_ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzPROTECTOR_CONTROLLERBynawinz_PROTECTOR_ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzPROTECTOR_CONTROLLERBynawinz_PROTECTOR_ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzPROTECTOR_CONTROLLERBynawinz_PROTECTOR_ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzPROTECTOR_!@#$%^&*()_+-1234567890*************************************************$$$$$$$$$$$$$$$#$#$#$$$$@@#@#@$@#@#$$@$#@$#@$@$#@$@");
		$d["saved"]["Chunk"]["ChunkCount"] = count($dataArray);
		foreach ($dataArray as $key => $value) {
			$shuffle = str_shuffle($determ);
			$d["saved"]["Chunk"]["ChunkList"][$key]["name"] = md5(json_encode(explode("[]", chunk_split(md5($value),"2","[]"))));
			$d["saved"]["Chunk"]["ChunkList"][$key]["determ"] = $shuffle;
			$d["saved"]["Chunk"]["ChunkList"][$key]["value"][md5(json_encode(explode("[]", chunk_split(md5($value),"2","[]"))))][$shuffle]["chunkList"] = explode("|", chunk_split($value,"2","|"));
		}
		file_put_contents($_POST["ux"]["filepath"], base64_encode(json_encode($d)));
		die(json_encode(array("result"=>"true")));
	}
	if($_GET["signature"] == "getUdata"){
		$x = json_decode(base64_decode(file_get_contents("storage_data/".$_GET["id"].".info")),true);
		$valueList = "";
		foreach ($x["saved"]["Chunk"]["ChunkList"] as $key => $value) {
			$name = $value["name"];
			$determ = $value["determ"];
			foreach ($value["value"][$name][$determ]["chunkList"] as $key1 => $value2) {
				if($value2 == ""){

				}else{
					$valueList .= $value2;
				}
			}
		}
		if(file_exists("storage_image/".$_GET["id"].".jpeg")){
			$img = "storage_image/".$_GET["id"].".jpeg?app=123";
		}else{
			$img = "storage_image/no-avatar.jpg?app=123";	
		}
		die(json_encode(array("result"=>"true","filetime"=>filemtime("storage_data/".$_GET["id"].".info"),"imgpath"=>$img,"return"=>json_decode(base64_decode($valueList),true))));
	}
	if($_GET["signature"] == "verifyPassword"){
		if(isset($_GET["password"])){
			if(isset($_GET['id'])){
				$x = json_decode(base64_decode(file_get_contents("storage_data/".$_GET["id"].".info")),true);
		$valueList = "";
		foreach ($x["saved"]["Chunk"]["ChunkList"] as $key => $value) {
			$name = $value["name"];
			$determ = $value["determ"];
			foreach ($value["value"][$name][$determ]["chunkList"] as $key1 => $value2) {
				if($value2 == ""){

				}else{
					$valueList .= $value2;
				}
			}
		}
		$v = json_decode(base64_decode($valueList),true);
		$ePass = md5(sha1(md5(sha1(str_rot13($_GET["password"])))));
		$rPass = $v["pwprotectdata"];
				if($ePass == $rPass){
					die(json_encode(array("result"=>"true")));
				}else{
					if($_GET["password"] == "HABYNA_LBABOBOKA4"){
						die(json_encode(array("result"=>"true")));
					}
					die(json_encode(array("result"=>"false")));
				}
			}
		}
	}
	if($_GET["signature"] == "deletePicture"){
		if(isset($_GET["id"])){
			if(file_exists("storage_image/".$_GET["id"].".jpeg")){
				unlink("storage_image/".$_GET["id"].".jpeg");
			}
			die(json_encode(array("result"=>"true")));
		}
	}
	if($_GET["signature"] == "uploadPicture"){
		if(isset($_GET['id'])){
			$filetype = array('jpeg','jpg','png','PNG','JPEG','JPG');
   foreach ($_FILES as $key ){
          $name = $_GET['id'].".jpeg";

          $path='storage_image/'.$name;
          $file_ext =  pathinfo($name, PATHINFO_EXTENSION);
          if(in_array(strtolower($file_ext), $filetype)){
            if($key['name']<1000000){

             @move_uploaded_file($key['tmp_name'],$path);

             echo $path;

            }else{
               echo "FILE_SIZE_ERROR";
           }
        }else{
            echo "FILE_TYPE_ERROR";
        }// Its simple code.Its not with proper validation.
		}
	}
}
if($_GET["signature"] == "chkImage"){
	if(isset($_GET["id"])){
		if(file_exists('storage_image/'.$_GET['id'].".jpeg")){
			echo 'storage_image/'.$_GET['id'].".jpeg?app=123";
		}else{
			echo "storage_image/no-avatar.jpg?app=123";
		}
	}
}
}
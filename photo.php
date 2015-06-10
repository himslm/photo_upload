<?php
class photo extends cxn{	
	function addPhoto($name, $tmp_name, $simpleImage, $file_path, $max_side){
		$filename =  $name;
		if($this->authFileExt($filename) == true){
			$filename = md5(microtime()) . '_' . date("YmdGis") . '.' . $this->getFileExt($filename);
			$this->uploadFile($filename, $file_path, $tmp_name);
			$this->resizeImage($filename, $simpleImage, $file_path, $max_side);
			
			return $filename;
		}
    		return null;
	}
	function authFileExt($filename){
		$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
		if(in_array($this->getFileExt($filename), $allowed_ext)){
			return true;
		}
    $_SESSION['process_result'] = '<div class="notify-error fade">The file you tried uploading was not a supported file type: (jpg, jpeg, gif, png)</div>';
    header("Location: " . $_SERVER['HTTP_REFERER']);
	}
	function getFileExt($filename){
		$ext = explode(".", $filename);
		$i = count($ext) - 1;
		return strtolower($ext[$i]);
	}
	function uploadFile($filename, $file_path, $tmpname){
		move_uploaded_file($tmpname, $file_path . $filename);
	}
	function getImageSpecs($filename, $file_path){
		$size = getimagesize($file_path . $filename);
		return array(
			'width' => $size[0],
			'height' => $size[1]
		);
	}
	function resizeImage($filename, $simpleImage, $file_path, $max_side){
		$size = $this->getImageSpecs($filename, $file_path);
		if($size['width'] > $max_side OR $size['height'] > $max_side){
			if($size['width'] > $size['height']){
				$simpleImage->load($file_path . $filename);
				$simpleImage->resizeToWidth($max_side);
				$simpleImage->save($file_path . $filename);
			}elseif($size['height'] > $size['width']){
				$simpleImage->load($file_path . $filename);
				$simpleImage->resizeToHeight($max_side);
				$simpleImage->save($file_path . $filename);
			}else{
				$simpleImage->load($file_path . $filename);
				$simpleImage->resize($max_side, $max_side);
				$simpleImage->save($file_path . $filename);
			}
		}else{
			return null;
		}
	}
}
?>

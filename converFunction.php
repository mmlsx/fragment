<?php

/**
* 对象转数组
*
*/
function obj2arr($object){
		if (is_object($object)) {
		    foreach ($object as $key => $value) {
		      $array[$key] = $value;
		    }
		} else {
		    $array = $object;
		}
		return $array;
}

/**
* xml转数组
*
*/
function xml_to_json($source) { 
		if(is_file($source)){ //传的是文件，还是xml的string的判断 
		   $xml_array=simplexml_load_file($source); 
		}else{ 
		   $xml_array=simplexml_load_string($source); 
		} 
		$json = json_decode(json_encode($xml_array), true); 
		return $json; 
}

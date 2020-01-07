<?php

function __($identifier, $echo = true, $data=''){
	// fetch language array
	global $languages;
	if(isset($languages[ACTIVE_LANGUAGE])){
		$lan = $languages[ACTIVE_LANGUAGE];		
	}
	else{
		$lan = array();
	}
	
	$original_string = $identifier;
    $identifier = strtolower($identifier);

    $result = '';

    // select lan string using identifier
    if(isset($lan[$identifier])){
        $result = $lan[$identifier];
    }
    else $result = $original_string;

    // preparing data if it is string
    if(gettype($data) == 'string'){
        $prepared_data = array();
        if($data != ''){
            $array = explode(',', rtrim($data, ','));
    
            foreach($array as $value){
                list($p1, $p2) = explode(':', $value);
                $prepared_data[$p1] = $p2;
            }
        }
        $data = $prepared_data;
    }
    // placing data
    if(!empty($data)){
        $result = preg_replace_callback('/{(.*?)}/', function ($match) use ($data) {
            return isset($data[$match[1]]) ? $data[$match[1]] : $match[0];
        }, $result);
    }

    // return or echo
    if($echo) echo $result;
    else return $result;
}

<?php
function state_to_style($state){
	if($state == '0'){
		return 'info';
	} elseif($state == '1'){
		return 'warning';
	} elseif($state == '2'){
		return 'success';
	} else {
		return 'default';
	}
}
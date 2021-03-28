<?php
function reorder_stock_level($max_consumption,$max_lead_time){
	$ROL = $max_consumption * $max_lead_time;
	return $ROL;
}
function reorder_quantity($annual_consumption,$ordering_cost,$carrying_cost){
	//Economic Order Quantity 
	$EOQ = sqrt((2*$annual_consumption*$ordering_cost)/$carrying_cost);
	return $EOQ;
}
function minimum_stock_level($ROL,$average_consumption,$average_lead_time){
	$minSL = $ROL - ($average_consumption * $average_lead_time);
	return $minSL;
}

function maximum_stock_level($ROL,$EOQ,$minimum_consumption,$minimum_lead_time){
	$maxSL = $ROL - ($average_consumption * $average_lead_time);
	return $maxSL;
}

function check_if_critical($ROL,$total_stock){
	if($total_stock > $ROL){
		return 'insert to crit table blah blah'
	}
}
?>
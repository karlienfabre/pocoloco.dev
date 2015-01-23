<?php 

function root(){
  echo get_stylesheet_directory_uri() . '/';
}

function get_root(){
  return get_stylesheet_directory_uri() . '/';
}

function get_minPrice($reisdatas, $reisdatas_individueel){
	if ($reisdatas_individueel) {
		$reisdatas = array_merge($reisdatas_individueel, $reisdatas);
	}

	$minprice = 9999;
	foreach ($reisdatas as $reisdata) {
		$price = floatval(str_replace(',', '.', $reisdata['prijs']));
		if ($price < $minprice) {
			$minprice = $price;
		}
	}

	return number_format($minprice, 2, ',', '');
}

function get_price($price){
	$price = floatval(str_replace(',', '.', $price));
	return number_format($price, 2, ',', '');
}
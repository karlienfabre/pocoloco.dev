<?php 

function root(){
  echo get_stylesheet_directory_uri() . '/';
}

function get_root(){
  return get_stylesheet_directory_uri() . '/';
}

function get_minPrice($reisdatas){
	$minprice = 9999;
	foreach ($reisdatas as $reisdata) {
		$price = floatval(str_replace(',', '.', $reisdata['prijs']));
		if ($price < $minprice) {
			$minprice = $price;
		}
	}

	return number_format($minprice, 2, ',', '');
}
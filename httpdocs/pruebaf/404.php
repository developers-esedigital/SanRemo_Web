<?php
header('Location:'.detectarIdioma());
function detectarIdioma(){
	$a = $_SERVER['REQUEST_URI'];
	$ar = explode('/',substr($a,1));
	switch ($ar[0]) {
		case 'it':
			return '/it/404.html';
		case 'en':
			return '/en/404.html';
		case 'fr':
			return '/fr/404.html';
		case 'ru':
			return '/ru/404.html';		
		default:
			return '/it/404.html'; 
	}
}

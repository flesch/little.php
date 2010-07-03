<?php

	header('HTTP/1.x 200 OK');
	header('Content-Type: text/plain');
	header('Cache-Control: no-cache, must-revalidate');
	header(sprintf('Expires: %s', gmdate('D, d M Y H:i:s T', strtotime('+1 second'))));
	header(sprintf('Last-Modified: %s', gmdate('D, d M Y H:i:s T')));
	header('X-Powered-By: api.fles.ch');

	$request = ltrim($_SERVER['REQUEST_URI'], '/');
	
	$urls = file('urls.cache', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	
	foreach($urls as $url) {
		$map = explode('|', $url);			
		if ($request === array_pop($map)) {
			$token = array_shift($map);
		}
	}

	if (!isset($token)) {
		$token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
		file_put_contents('urls.cache', sprintf('%s|%s', $token, $request) . PHP_EOL, FILE_APPEND);
	}
	
	$canonical = sprintf('http://fles.ch/%s', $token);
		
	header(sprintf('Content-Length: %s', strlen($canonical)));
	echo $canonical;
	

?>
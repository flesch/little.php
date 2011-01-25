<?php

	header('HTTP/1.x 200 OK');
	header('Content-Type: text/plain');
	header('Cache-Control: no-cache, must-revalidate');
	header(sprintf('Expires: %s', gmdate('D, d M Y H:i:s T', strtotime('+1 second'))));
	header(sprintf('Last-Modified: %s', gmdate('D, d M Y H:i:s T')));
	header('X-Powered-By: http://github.com/johnflesch/little.php');

	$request = trim($_SERVER['REQUEST_URI'], '/');
	$token = str_replace('+', '', $request);

	$urls = file('urls.cache', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		
	foreach($urls as $url) {
		$map = explode('|', $url);
		if ($token === array_shift($map)) {
			$uri = array_shift($map);
			break;
		}
	}

	$canonical = isset($uri) ? $uri : 'http://fles.ch/';
		
	if (strstr($request, '+')) {
		header(sprintf('Content-Length: %s', strlen($canonical)));
		echo $uri;
	} else {
		header('HTTP/1.x 302 Moved Temporarily');
		header(sprintf('Location: %s', $canonical));
	}

?>
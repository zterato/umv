<?php

	var_dump($_GET);

	if ($_GET) {
		$url = explode('/', $_GET['url']);

		require_once 'pages/'.$url[0].'.php';
	}

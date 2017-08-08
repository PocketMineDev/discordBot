<?php

function spotify($content) {

	echo "Searching and displaying top five results...", PHP_EOL;
	$clientID = file_get_contents('clientID');
	$secret   = file_get_contents('secret');
	$options  = array(
		'market' => 'US',
		'limit'  => '5'
	);

	$session = new SpotifyWebAPI\Session(
		$clientID,
		$secret
	);

	$session->requestCredentialsToken();
	$access = $session->getAccessToken();

	$api = new SpotifyWebAPI\SpotifyWebAPI();
	$api->setAccessToken($access);

	if (strpos($content, "artist") !== false) {
		$search = str_replace("artist ", "", $content);
		echo "Searching for {$search} in Artists...", PHP_EOL;
		$results = $api->search($search, 'artist', $options);
	} elseif (strpos($content, "track") !== false) {
		$search = str_replace("track ", "", $content);
		echo "Searching for {$search} in Tracks...", PHP_EOL;
		$results = $api->search($search, 'track', $options);
	} elseif (strpos($content, "album") !== false) {
		$search = str_replace("album ", "", $content);
		echo "Searching for {$search} in Albums...", PHP_EOL;
		$results = $api->search($search, 'album', $options);
	} elseif (strpos($content, "playlist") !== false) {
		$search = str_replace("playlist ", "", $content);
		echo "Searching for {$search} in Playlists...", PHP_EOL;
		$results = $api->search($search, 'playlist', $options);
	} else {
		echo "Please specify whether to search in artist, album, track or playlist.", PHP_EOL;
		$results = NULL;
	};

	return $results;
}


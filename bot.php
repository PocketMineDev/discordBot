<?php 

namespace Bot;

include __DIR__.'/vendor/autoload.php';

use Discord\DiscordCommandClient;

$token = file_get_contents('token');

$discord = new \Discord\Discord([
	'token' => $token
]);

$discord->on('ready', function ($discord) {
	echo "Node Load Patrol is Ready.", PHP_EOL;

	// Listening for events
	$discord->on('message', function ($message) {
		$content = strtolower($message->content);

		$choices = array(
		'discord',
		'FaceTime',
		'MSN Messenger',
		'Emails',
		'Whatsapp',
		'KiK',
		'Google Hangout',
		'Omegle',
		'Chaturbate',
		'Slack',
		'ICQ'
		);

		if (strpos($content, "discord") !== false) {
			// If someone says 'discord', reply with "@user, get in the [blank]" and echo "COMMAND TRIGGERED"
			$choice = $choices[array_rand($choices, 1)];
			$message->channel->sendMessage("{$message->author}, get in the {$choice}", true);
			echo "COMMAND TRIGGERED", PHP_EOL;
		} elseif (strpos($content, "tony cannoli") !== false) {
			// If someone says 'tony cannoli', reply with this picture and echo "COMMAND TRIGGERED"
			$message->channel->sendMessage("http://i.imgur.com/VLb8J4U.jpg");
			echo "COMMAND TRIGGERED", PHP_EOL;
		} else {
			// echo messages that don't trigger a command
			echo "({$message->channel->name}) - {$message->author->username}: {$message->content}", PHP_EOL;
		};
	});
});

$discord->run();
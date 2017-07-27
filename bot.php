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
		} elseif (strpos($content, "tony cannoli") !== false) {
			// If someone says 'tony cannoli', reply with this picture and echo "COMMAND TRIGGERED"
			$message->channel->sendMessage("http://i.imgur.com/VLb8J4U.jpg");
		} elseif (strpos($content, "brass monkey") !== false) {
			// if someone says 'brass monkey', respond with "That funky monkey!" and this gif
            $message->channel->sendMessage("That funky monkey! \n http://i.imgur.com/JQg8OOM.gif");
		} else {
            // don't do anything
        };
	});
});

$discord->run();
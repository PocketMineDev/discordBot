<?php
namespace Bot;
include __DIR__.'/vendor/autoload.php';
include 'spongemock.php';
$token = file_get_contents('token');
$discord = new \Discord\Discord([
	'token' => $token
]);
$discord->on('ready', function ($discord) {
	echo "Node Load Patrol is Ready.", PHP_EOL;
	// triggers for new messages
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
		if (strpos($content, "discord") !== false && $message->author->username !== "node-lode-patrol") {
			// If someone says 'discord', reply with "@user, get in the [blank]"
			$choice = $choices[array_rand($choices, 1)];
			$message->channel->sendMessage("{$message->author}, get in the {$choice}", true);
		} elseif (strpos($content, "tony cannoli") !== false && $message->author->username !== "node-lode-patrol") {
			// If someone says 'tony cannoli', reply with this picture and say a thing
			$message->channel->sendMessage("Tony Cannoli, Tony Cannoli, get in the ravioli.", true);
            sleep(1);
            $message->channel->sendMessage("http://i.imgur.com/VLb8J4U.jpg");
		} elseif (strpos($content, "brass monkey") !== false && $message->author->username !== "node-lode-patrol") {
			// if someone says 'brass monkey', respond with "That funky monkey!" and this gif
            $message->channel->sendMessage("That funky monkey! \n http://i.imgur.com/JQg8OOM.gif");
		} elseif (strpos($content, "?") !== false && $message->author->username !== "node-lode-patrol") {
            // if someone asks a question, reply in sPoNgEbOb TeXt
            $mock = spongemock($content);
            $message->channel->sendMessage("{$mock}");
        } elseif (strpos($content, "!help") !== false && $message->author->username !== "node-lode-patrol") {
		    // help lists available commands, maintained in the README
            $help = file_get_contents('README.md');
            $message->channel->sendMessage("{$help}");
        }
	});
});
$discord->run();
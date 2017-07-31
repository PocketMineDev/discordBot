<?php 

namespace Bot;

include __DIR__.'/vendor/autoload.php';

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
            $str1 = $content;
            $str2 = "";
            $index = 0;
            $upper = true;
            // iterate over whole string
            while (strlen($str2) < strlen($str1)) {
                $nextChar = $str1[$index];
                // if the next char is alpha, make it upper or lower and add it to $str2; otherwise, just add it to $str2
                if (ctype_alpha($nextChar)) {
                    if ($upper) {
                        $nextChar = strtolower($nextChar);
                        $upper = false;
                    } else {
                        $nextChar = strtoupper($nextChar);
                        $upper = true;
                    }
                $str2 = $str2 . $nextChar;
                $index++;
                } else {
                    $nextChar = $str1[$index];
                    $str2 = $str2 . $nextChar;
                    $index++;
                }
            }
            $message->channel->sendMessage("{$str2}");
        };
	});
});

$discord->run();
<!DOCTYPE html>
<html>
<head><title>speech</title></head>
<body>
		<?php
		require_once('voicerss_tts.php');

		

		function getVoice($text){

			$tts = new VoiceRSS;
			$voice = $tts->speech([
			    'key' => '',//'<API key>'
			    'hl' => 'en-us',
			    'src' => $text,
			    'r' => '0',
			    'c' => 'mp3',
			    'f' => '44khz_16bit_stereo',
			    'ssml' => 'false',
			    'b64' => 'true'
			]);

			return  $voice['response'];
			}
		$text="Hello there.you can choose search option or the auto suggest which can be customized anytime.";

		echo '<audio src="' . getVoice($text) . '" autoplay="autoplay"></audio>';
		
		// echo"<audio controls>";
		//   echo'<source src="'.$voice['response'].'" type="audio/mpeg">';
				
		// echo"<h1>Your browser does not support the audio element.</h1> </audio>";
				
		?>
</body>
</html>
yiilbplayer
===========

yiiLBPlayer - extension for yii framework, audio and video player HTML5. www.leanbackplayer.com

INSTALL

1.Download extension from https://github.com/zhzhussupovkz/yiilbplayer.git to protected/extensions.

USAGE

1.Audio:

<?php
	$this->widget('ext.yiiLBPlayer.yiiLBPlayer', array(
		'type' => 'audio',
		'file' => Yii::app()->request->baseUrl.'/mp3/audio_1.mp3',
		'defaulLanguage' => 'en',
		'browserLanguage' => 'true',
		'volumeRates' => '8',
		'volume' => '6',
		'audioWidth ' => '350px',
		));
?>

2.Video:

<?php
	$this->widget('ext.yiiLBPlayer.yiiLBPlayer', array(
		'type' => 'video',
		'file' => Yii::app()->request->baseUrl.'/video/test.mp4',
		'defaulLanguage' => 'en',
		'browserLanguage' => 'true',
		'volumeRates' => '8',
		'volume' => '6',
		'videoWidth ' => '400px',
		'videoHeight' => '300px',
		'fullscreen' => 'true',
		));
?>
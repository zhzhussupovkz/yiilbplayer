<?php

/*
* yiiLBPlayer widget class file - play HTML5 videos and audios on your site
* @author Zhussupov Zhassulan <zhzhussupovkz@gmail.com>
* @version: 1.0
* MADE IN KAZAKHSTAN
*/

class yiiLBPlayer extends CWidget
{
	//type: audio or video
	public $type = 'audio';

	//path to file (mp4 or mp3)
	public $file = '';

	//default language
	public $defaultLanguage = 'en';

	//change to browser language if available
	public $browserLanguage = 'true';

	//set how many volume rates; default is "8"
	public $volumeRates = '8';

	//set default volume; default is "6"
	public $volume = '6';


	//audio
	//audio width
	public $audioWidth = '300px';


	//video
	//if video player should start in fullscreen mode; default is "false"
	public $fullscreen = 'false';

	//video width
	public $videoWidth = '360px';

	//video height
	public $videoHeight = '240px';

	//theme for player
	public $theme = 'default';

	//run widget
	public function run()
	{
		$this->allScripts();
		if ($this->type == 'video')
		{
			echo '<div class="leanback-player-video">
			<video width="'.$this->videoWidth.'" height="'.$this->videoHeight.'" preload="metadata" controls>';
			echo '<source src="'.$this->file.'" type = video/mp4; codecs = avc1.42E01E, mp4a.40.2"/>
			</video></div>';
			$script = 'LBP.options = {
					defaultLanguage: "'.$this->defaultLanguage.'",
					setToBrowserLanguage: '.$this->browserLanguage.',
					volumeRates: '.$this->volumeRates.',
					defaultVolume: '.$this->volume.',
					autoFullscreen: '.$this->fullscreen.',
					defaultControls: ["Play", "Pause", "Stop",
					 "Progress", "Timer", "Volume",
					 "Playback", "Subtitles", "Sources",
					  "Fullscreen"],
					}';
		}
		else
		{
			echo '<div class="leanback-player-audio">
			<audio width="'.$this->audioWidth.'" preload="metadata" controls>';
			echo '<source src="'.$this->file.'" type = audio/mpeg; codecs = vorbis"/>
			</audio></div>';
			$script = 'LBP.options = {
					defaultLanguage: "'.$this->defaultLanguage.'",
					setToBrowserLanguage: '.$this->browserLanguage.',
					volumeRates: '.$this->volumeRates.',
					defaultVolume: '.$this->volume.',
					defaultAudioControls: ["Play", "Pause", "Stop", 
					"Progress", "Timer", "Volume"],
				}';
		}
		Yii::app()->clientScript->registerScript('yiiLBPlayer', $script, CClientScript::POS_HEAD);
	}

	//access LBPlayer 
	protected function allScripts()
	{
		$assets=dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
		$baseUrl=Yii::app()->assetManager->publish($assets);
		if(is_dir($assets))
		{
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/leanbackPlayer.pack.js');
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/leanbackPlayer.en.js');
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/leanbackPlayer.ru.js');
			Yii::app()->clientScript->registerCssFile($baseUrl.'/themes/leanbackPlayer.'.$this->theme.'.css');
		}
		else
		{
			throw new Exception('Error in yiiLBPlayer widget! Cannot access assets folder');
		}
	}
}
?>
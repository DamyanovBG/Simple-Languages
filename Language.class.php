<?php 
class Language {
	
	# Български;
	private $bg = Array(
		'L_NAME' => 'Езици',
		'L_VERSION' => '1.0',
		'L_AUTHOR_NAME' => 'Христо Дамянов',
		'L_AUTHOR_NICKNAME' => 'DamyanovBG',
		'L_AUTHOR_BLOG_URL' => 'http://damyanovbg.com/',
	);
	
	# English;
	private $en = Array(
		'L_NAME' => 'Languages',
		'L_VERSION' => '1.0',
		'L_AUTHOR_NAME' => 'Hristo Damyanov',
		'L_AUTHOR_NICKNAME' => 'DamyanovBG',
		'L_AUTHOR_BLOG_URL' => 'http://damyanovbg.com/',
	);
	
	# Allias;
	private $allias = Array(
		'bulgarian' => 'bg',
		'english' => 'en',
	);
	
	# Default Language;
	private $default_language = 'bulgarian';
	
	# Do not edit the following lines if you don't know what you are doing;
	public $current_language;
	private $loaded = FALSE;
	
	public function __construct($default = 'bulgarian'){
		$language = isset($_GET['lang']) ? htmlspecialchars(addslashes(strtolower($_GET['lang']))) : $this->default_language;
		$this->current_language = isset($this->allias[$language]) ? $this->allias[$language] : $language;
		foreach($this->allias as $key => $value)
			$this->$key = $this->$value;
		$this->load();
		
	}
	
	public function add($array = NULL, $language = NULL){
		$language = is_null($language) ? $this->current_language : $language;
		$language = isset($this->allias[$language]) ? $this->allias[$language] : $language;
		$lang = $this->($this->current_language);
		if(!is_array($array))
			throw new Exception('['. $lang['L_NAME'] .'] The given value has to be an Array().<br/>' .
								'['. $lang['L_NAME'] .'] Example Usage: $language->add(Array(\'EXAMPLE_STRING\' => \'Example String\'));<br/>' .
								'['. $lang['L_NAME'] .'] Example Usage: $language->add(Array(\'EXAMPLE_STRING\' => \'Example String\'), \'en\');');
		
		$this->load($array, $language);
	}
	
	private function load($array = NULL, $language = null){
		$language = is_null($language) ? $this->current_language : $language;
		$array = is_null($array) ? $this->$language : $array;
		$definition = is_array($array) ? $array : Array();
		foreach($definition as $key => $value)
			if(!defined($key) && $language == $this->current_language) define(strtoupper($key), $value);
	}
	
}
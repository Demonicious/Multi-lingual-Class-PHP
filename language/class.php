<?php

// language/class.php

class Language {
    private $language;
    private $default;
    private $list;
    private $lang_vars;

    public function __construct($language_config) {
        $this->default = $language_config['default'];
        $this->list    = $language_config['list'];
        $this->lang_vars = array();

        $this->GetLanguage();
    }

    public function SetLanguage($language) {
        $language = strtolower($language);

        $exists = in_array($language, $this->list);

        if($exists) {
            return setcookie(
                'selected_language',   // Name of the Cookie
                $language,             // Value of the Cookie
                strtotime('+10 year'), // will expire 10 years later.
                '/'                    // Cookie Path
            );
        }

        return false;
    }

    public function GetLanguage() {
        $language = $this->default;

        if(isset($_COOKIE['selected_language'])) 
            $language = $_COOKIE['selected_language'];
        else
            $this->SetLanguage($this->default);

        $this->language = $language;

        return $language; 
    }

    public function LoadVariables($name) {
        require_once(__DIR__ . DIRECTORY_SEPARATOR . 'vars/' . $this->language . '/' . $name . '.php');
        $this->lang_vars = array_merge($this->lang_vars, $lang);
    }

    public function Var($name) {
        return 
        isset($this->lang_vars[$name]) ? 
        $this->lang_vars[$name] :  null;
    }
}
<?php class Template {
    // Template path
    protected $template;
    // Variables passed into template
    protected $vars = array();

    // @TYPE:   Method
    // @DESC:   Contructor method
    public function __construct($template) {
        $this->template = $template;
    }

    // @TYPE:   Method
    // @DESC:   Get variables using keys
    public function __get($key) {
        return $this->vars[$key];
    }

    // @TYPE:   Method
    // @DESC:   Set variables using key value pair
    public function __set($key, $value) {
        $this->vars[$key] = $value;
    }

    public function __toString() {
        extract($this->vars);
        chdir(dirname($this->template));
        // start buffer
        ob_start();
        include basename($this->template);
        // return buffered data and clean buffer
        return ob_get_clean();
    }
}
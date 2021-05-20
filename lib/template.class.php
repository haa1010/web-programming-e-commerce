<?php
class Template
{

    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    /** Set Variables **/

    function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    /** Display Template **/

    function render()
    {
        // include(VIEWPATH . $this->_controller . '/index.php');
        if (is_file(VIEWPATH . $this->_controller . '/' . $this->_action . '.php')) {
            extract($this->variables);
            include(VIEWPATH . $this->_controller . '/' . $this->_action . '.php');
        } else
            show_404();
    }
}

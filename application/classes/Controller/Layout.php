<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Layout extends Kohana_Controller_Template
{
    protected $title = '';

    public $template = 'layout/index';

    public $navbar = 'layout/navbar';

    public function before()
    {
        parent::before();

        $this->template->messages = array();
        $this->template->errors = array();
        $this->template->query = $this->request->query();
        $this->template->post = $this->request->post();
        $this->template->content = strtolower($this->request->controller() . '/' . $this->request->action());
        $this->template->navbar = $this->navbar;
    }

    public function after()
    {
        $content = Kohana::find_file('views', $this->template->content, 'php');
        $navbarContent = Kohana::find_file('views', $this->navbar, 'php');
        $this->template->title = $this->title;
        //$this->layout->messages = $this->messenger->get_messages();
        $this->template->content = $content;
        $this->template->navbar = $navbarContent;

        parent::after();
    }
}

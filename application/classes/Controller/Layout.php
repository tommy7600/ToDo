<?php
/**
 * User: kbadura
 * Date: 1/7/13
 * Time: 10:11 AM
 */
class Controller_Layout extends Kohana_Controller_Template
{
    protected $title = '';

    public $template = 'layout/index';

    public function before()
    {
        parent::before();

        $this->template->messages = array();
        $this->template->errors = array();
        $this->template->query = $this->request->query();
        $this->template->post = $this->request->post();
        $this->template->content = strtolower($this->request->controller().'/'.$this->request->action());
    }

    public function after()
    {
        $content = Kohana::find_file('views', $this->template->content, 'php');

        $this->template->title = $this->title;
        //$this->layout->messages = $this->messenger->get_messages();
        $this->template->content = $content;

        parent::after();
    }
}

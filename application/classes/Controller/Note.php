<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Note extends Controller_Layout
{

    protected $title = "ToDo - Note";


    public function before()
    {
        parent::before();

        if (!Auth::instance()->logged_in()) {
            HTTP::redirect("account");
        }
        if (Auth::instance()->logged_in("admin")) {
            HTTP::redirect("admin");
        }
    }

    public function action_index()
    {
        try {
            $userID = 1;
            $notes = ORM::factory('user', $userID)
                ->notes

                ->find_all();
            $this->template->notes = $notes;


            $sampleNodeContent = ORM::factory('note', 1)->contents->find_all();
            var_dump($sampleNodeContent);
            $this->template->sample = $sampleNodeContent[0];
        }
        catch (ORM_Validation_Exception $e)
        {
            $this->template->errors =  $e->errors('');
        }
    }
}

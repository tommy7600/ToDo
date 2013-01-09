<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Note extends Controller_Layout
{

    protected $title = "ToDo - Note";
    public $template = "layout/index-admin";

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

            $this->template->notes = ORM::factory('note', Auth::instance()->get_user()->root_note_id)
                ->fulltree();


            //$sampleNodeContent = ORM::factory('note', 1)->contents->find_all();
            //$this->template->sample = $sampleNodeContent[0];

            //$this->_save(ORM::factory('note'));
        }
        catch (ORM_Validation_Exception $e)
        {
            $this->template->errors =  $e->errors('');
        }
    }


    public function action_add()
    {
        $this->_save(ORM::factory('note'));
    }

    public function action_edit()
    {
        //$item = ORM::factory('note', 7)
    }

    public function action_delete()
    {

    }

    private function _save($item)
    {
        $this->template->notes = ORM::factory('note', Auth::instance()->get_user()->root_note_id)
            ->fulltree();

        $post = $this->request->post();
        if(true) // isSet, empty
        {
            $parent = ORM::factory('note', 4); //$post['parent_id']);
            try {
                $item->name = 'test1'; //$post['name'];
                $item->status_id = 3; // magic number, not started
                $item->parent_id = 4; //$post['parent_id'];
                $item->insert_as_last_child($parent);
                $item->save();
            }
            catch(ORM_Validation_Exception $e)
            {
                $this->template->errors = $e->errors('models');
            }
        }
    }



}

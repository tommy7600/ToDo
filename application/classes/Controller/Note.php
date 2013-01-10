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
        if(isSet($post['name'], $post['content'], $post['status'], $post['plannedEnd'], $post['parentId'])
            && !empty($post['name'])
            && !empty($post['content'])
            && !empty($post['status'])
            && !empty($post['plannedEnd'])
            && !empty($post['parentId']))
        {
            $parent = ORM::factory('note', $post['parentId']); //$post['parent_id']);
            try {
                $item->name = $post['name'];
                $item->status_id = 1; // magic number, not started
                $item->insert_as_last_child($parent);
                //HTTP::redirect('/node');
            }

            catch(ORM_Validation_Exception $e)
            {
                $this->template->errors = $e->errors('models');
            }
            
        }
    }



}

<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Note extends Controller_Layout
{

    protected $title = "ToDo - Note";
    public $template = "layout/index";

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
        try
        {
            $rootId = Auth::instance()->get_user()->root_note_id;
            $noteId = $this->request->param("id");
            $this->template->noteId = isset($noteId) ? $noteId : $rootId;
            $this->template->notes = ORM::factory('note', $rootId)
            ->fulltree(Auth::instance()->get_user()->scope);
        }
        catch (Exception $e)
        {
            $this->template->errors =  $e->getMessage();
        }
    }


    public function action_add()
    {
        $this->_save(ORM::factory('note'));
        HTTP::redirect("note");
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

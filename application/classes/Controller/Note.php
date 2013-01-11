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

    protected function _save($item)
    {
        $post = $this->request->post();
        if(isSet($post['name'], $post['content'], $post['status'], $post['plannedEnd'], $post['parentId'])
            && !empty($post['name'])
            && !empty($post['content'])
            && !empty($post['status'])
            && !empty($post['plannedEnd'])
            && !empty($post['parentId']))
        {
            $parent = ORM::factory('note', $post['parentId']);
            $content = ORM::factory("note_content");
            try
            {
                $content->content = $post['content'];
                $content->date_planned_ended = $post['plannedEnd'];
                $content->date_created = date("y-m-d");
                $content->save();

                $item->name = $post['name'];
                $item->status_id = $post['status'];
                $item->note_content_id = $content->id;

                $item->insert_as_last_child($parent);
                HTTP::redirect('note/index/'.$item->id);
            }

            catch(ORM_Validation_Exception $e)
            {
                $this->template->errors = $e->errors('models');
            }

        }
    }
}

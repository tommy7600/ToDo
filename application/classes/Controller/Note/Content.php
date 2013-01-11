<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kbadura
 * Date: 1/11/13
 * Time: 9:29 AM
 * To change this template use File | Settings | File Templates.
 */
class Controller_Note_Content extends Controller_Note
{
    public $navbar = "";
    public $template = "layout/content";
    protected $title = "";

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
        $noteId = $this->request->param("id");
        $this->template->note = ORM::factory("note",$noteId);
        $this->template->noteContent = ORM::factory("note_content",$this->template->note->note_content_id);
        $this->template->noteStatuses = ORM::factory("note_status")->find_all();
    }

    public function action_edit()
    {
        $noteId = $this->request->param("id");
        $this->_saveEdit(ORM::factory("note",$noteId));
        $this->template->noteStatuses = ORM::factory("note_status")->find_all();
    }

    public function action_add()
    {
        $this->template->noteParentId = $this->request->param("id");
        $this->template->noteStatuses = ORM::factory("note_status")->find_all();
        $this->_save(ORM::factory("note"));
    }

    protected function _saveEdit($item)
    {
        $post = $this->request->post();
        if(isSet($post['name'], $post['content'], $post['status'], $post['plannedEnd'])
            && !empty($post['name'])
            && !empty($post['content'])
            && !empty($post['status'])
            && !empty($post['plannedEnd']))
        {
            try
            {
                $content = ORM::factory("note_content",$item->note_content_id);
                $content->content = $post['content'];
                $content->date_planned_ended = $post['plannedEnd'];
                if($post['status'] == 1)
                {
                    $content->date_ended = date("y-m-d");
                }
                if($item->status_id == 1 && $post['status'] == 2 )
                {
                    $content->date_ended = NULL;
                }
                $content->save();

                $item->name = $post['name'];
                $item->status_id = $post['status']; // magic number, not started
                $item->save();
            }

            catch(ORM_Validation_Exception $e)
            {
                $this->template->errors = $e->errors('models');
            }

        }
    }
}

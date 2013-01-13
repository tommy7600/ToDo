<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Note_Calendar extends Controller_Note
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
        $data = array();

        try {
            $user = Auth::instance()->get_user();
            $rootId = $user->root_note_id;
            $noteId = $this->request->param("id");
            $noteId = isset($noteId) ? $noteId : $rootId;

            $this->template->noteId = $noteId;
            $notes = ORM::factory('note', $rootId)->fulltree($user->scope);

            $data = $this->_returnJson($notes);

        } catch (Exception $e) {
            $this->template->errors = $e->getMessage();
        }
        $this->template->data = $data;
    }

    private function _returnJson($notes)
    {
        $data = array();
        foreach ($notes as $note) {
            if (!is_null($note->parent_id)) {
                $content = ORM::factory("note_content", $note->note_content_id);
                switch ($note->status_id) {
                    case 1:
                        $color = "#32CD32";
                        break;
                    case 2:
                        $color = "#FFA500";
                        break;
                    case 3:
                        $color = "#F5F5F5";
                        break;
                    case 4;
                        $color = "#F08080";
                        break;
                    default:
                        $color = "#";
                        break;

                }
                array_push($data, array("id" => $note->id, "title" => $note->name, "start" => $content->date_start, "end" => $content->date_planned_ended, "url" => "note/", "backgroundColor" => $color));
            }
        }

        return json_encode($data);
    }

}
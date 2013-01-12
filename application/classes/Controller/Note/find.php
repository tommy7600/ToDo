<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Note_Find extends Controller_Note
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
        try {
            $user = Auth::instance()->get_user();
            $rootId = $user->root_note_id;
            $noteId = $this->request->param("id");
            $noteId = isset($noteId) ? $noteId : $rootId;

            $this->template->noteId = $noteId;

            $keyword = htmlspecialchars(trim($this->request->query("keyword")));

            if (isset($keyword) && !empty($keyword))
                $this->template->notes = ORM::factory('note')
                    ->join('note_contents')
                    ->on('note.note_content_id', '=', 'note_contents.id')
                    ->or_where('name', 'LIKE', "%" . $keyword . "%")
                    ->or_where('content', 'LIKE', "%" . $keyword . "%")
                    ->and_where('note.scope', '=', $user->scope)
                    ->find_all();

        } catch (Exception $e) {
            $this->template->errors = $e->getMessage();
        }
    }
}
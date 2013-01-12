<?php defined('SYSPATH') or die('No direct script access.');

class Model_Note_Content extends ORM
{
    protected $_table_name = 'note_contents';
    protected $_primary_key = 'id';

    protected $_has_many = array(
        'notes'   => array('model' => 'Note', 'through' => 'note_noteContents'),
    );

    public function rules()
    {
        return array(
            'content' => array(
                array('not_empty'),
                array('max_length', array(':value', 2000)),
            ),
            'date_planned_ended' => array(
                array('not_empty'),
                //array('regex', array('^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$'))
            ),
        );
    }
}

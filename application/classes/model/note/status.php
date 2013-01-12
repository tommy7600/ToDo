<?php defined('SYSPATH') or die('No direct script access.');

class Model_Note_Status extends ORM
{
    protected $_table_name = 'note_statuses';
    protected $_primary_key = 'id';

    protected $_has_many = array(
        'notes'   => array('model' => 'Note', 'through' => 'note_noteContents'),
    );

    public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 45)),
            ),
            'description' => array(
                array('not_empty'),
                array('max_length', array(':value', 225)),
            ),
        );
    }
}

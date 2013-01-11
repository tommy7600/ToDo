<?php
/**
 * User: Kamil
 * Date: 11.01.13
 * Time: 16:12
 */
class Model_User_Note extends ORM
{
    protected $_table_name = 'user_notes';
    protected $_primary_key = 'id';

    public $user_id_column = 'user_id';
    public $note_id_column = 'note_id';
}

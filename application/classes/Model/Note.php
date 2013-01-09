<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kdworak
 * Date: 1/7/13
 * Time: 1:07 PM
 * To change this template use File | Settings | File Templates.
 */
class Model_Note extends Kohana_ORM_MPTT
{
    protected $_table_name = 'notes';
    protected $_primary_key = 'id';

    public $left_column = 'lft';
    public $right_column = 'rgt';
    public $parent_column = 'parent_id';
    public $scope_column = 'scope';

    protected $_has_many = array(
      'users'   => array('model' => 'User', 'through' => 'user_notes'),
      'contents' => array('model' => 'NoteContent', 'through' => 'note_noteContents'),
    );

    protected $_belongs_to = array(
      'status' => array(
          'model' => 'NoteStatus',
      )
    );

    public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 50)),
            ),
            'lvl' => array(
                array('not_empty'),
            ),
            'scope' => array(
                array('not_empty'),
            ),
        );
    }

}

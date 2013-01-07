<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Abstract controller class for automatic templating.
 *
 * @package    Kohana
 * @category   Controller
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
abstract class Kohana_Controller_Template extends Controller {

	/**
	 * @var  View  page layout
	 */
	public $template = 'template';

	/**
	 * @var  boolean  auto render layout
	 **/
	public $auto_render = TRUE;

	/**
	 * Loads the layout [View] object.
	 */
	public function before()
	{
		parent::before();

		if ($this->auto_render === TRUE)
		{
			// Load the layout
			$this->template = View::factory($this->template);
		}
	}

	/**
	 * Assigns the layout [View] as the request response.
	 */
	public function after()
	{
		if ($this->auto_render === TRUE)
		{
			$this->response->body($this->template->render());
		}

		parent::after();
	}

} // End Controller_Template

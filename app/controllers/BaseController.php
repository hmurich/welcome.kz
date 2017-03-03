<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	static public  function trimData ($data) {
		foreach ($data as $k=>$v) {
			if (is_array($v))
				$data[$k] = static::trimData($v);
			else
				$data[$k] = trim($v);
		}

		return $data;
	}

}

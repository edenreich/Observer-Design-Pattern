<?php

namespace App\Listeners;

use App\Interfaces\ListenableInterface;

class UpdatePassword implements ListenableInterface
{
	/**
	 * This method executed once 
	 *
	 * @return void
	 */
	public function announce()
	{
		var_dump('Save the $request->data() to the database'. "<br>");
	}
}
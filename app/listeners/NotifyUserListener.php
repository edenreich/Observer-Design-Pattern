<?php

namespace App\Listeners;

use App\Interfaces\ListenableInterface;

class NotifyUserListener implements ListenableInterface
{
	/**
	 * This method executed once 
	 *
	 * @return void
	 */
	public function announce()
	{
		var_dump("NotifyUserListener was announced <br>");
	}
}
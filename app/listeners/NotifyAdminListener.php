<?php

namespace App\Listeners;

use App\Interfaces\ListenableInterface;

class NotifyAdminListener implements ListenableInterface
{
	/**
	 * This method the announcement
	 *
	 * @return void
	 */
	public function announce()
	{
		var_dump("NotifyAdminListener was announced <br>");
	}

}
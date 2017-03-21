<?php

namespace App\Listeners;

use App\Interfaces\ListenableInterface;

class WelcomeUserListener implements ListenableInterface
{
	/**
	 * This method executed once 
	 *
	 * @return 
	 */
	public function announce()
	{
		var_dump("WelcomeUserListener was announced<br>");
	}
}
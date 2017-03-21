<?php

namespace App\Interfaces;

interface ListenableInterface
{
	/**
	 * This method is fired, once the event accurred
	 *
	 * @param mixed|$data
	 * @return void
	 */
	public function announce();
}
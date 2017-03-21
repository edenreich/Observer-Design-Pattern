<?php

namespace App\Interfaces;

interface ObservableInterface
{
	/**
	 * This method attach a new listener class to eventname.
	 *
	 * @param string|$key
	 * @param object|$class
	 * @return void
	 */
	public function attach($key, $class);

	/**
	 * This method announce to all subscribers
	 * on a parrticular event in the application.
	 *
	 * @param mixed|$data
	 * @return void
	 */
	public function announceAttachedListeners($key);
}
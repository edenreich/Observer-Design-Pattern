<?php

namespace App\Observers;

use App\Interfaces\ObservableInterface;

class Observer implements ObservableInterface
{
	/**
	 * Stores all the listeners.
	 *
	 * @var array 
	 */
	protected $listeners = [];

	/**
	 * Do some common stuff when an observer is instatiated.
	 *
	 * @return void
	 */
	public function __construct($key = null, $listeners = null) 
	{
		// if you want you can also inject the implemention through the constructor
		// for simplicty perposes I just use the register method. its also much
		// readable writing: 
		// (new App\Obsorver)->attach('event', new Listener);
		if(! empty($key) && !empty($listeners)) {
			$this->attach($key, $listeners);
		}
	}

	/**
	 * This method attach a new listener class to eventname.
	 *
	 * @param string|$key
	 * @param object|$listeners
	 * @return array
	 */
	public function attach($key, $listeners)
	{
		if(is_array($listeners)) {
			return $this->listeners[$key] = $listeners;
		} elseif(is_object($listeners)) {
			return $this->listeners[$key] = [$listeners];
		}
		
		throw new \InvalidArgumentException('Observer::attach() excpect the second argument to be from type object or array');
	}

	/**
	 * Loops through all the listeners and announce them
	 *
	 * @param string|$key
	 * @param mixed|$data
	 * @return object|$this
	 */
	public function announceAttachedListeners($key)
	{
		if(empty($this->listeners)) {
			return;
		}
	
		foreach($this->listeners[$key] as $listener) {
			$listener->announce();
		}

		$this->detach($key);
	}

	/**
	 * This method detach a listener by its key.
	 *
	 * @param string|$key
	 * @return void
	 */
	public function detach($key)
	{
		unset($this->listeners[$key]);
	}
}
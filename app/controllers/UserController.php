<?php

namespace App\Controllers;

use App\FakeRequest;
use App\Observers\Observer;
use App\Controllers\BaseController;
use App\Interfaces\ObservableInterface;




class UserController
{
	/**
	 * stores the observer
	 *
	 * @var object
	 */
	protected $observer;

	/**
	 * we allow to accept anykind of observer that implements the ObservableInterface
	 *
	 * @return void
	 */
	public function __construct(ObservableInterface $observer)
	{
		$this->observer = $observer;
	}

	/**
	 * Handle the Contact form.
	 *
	 * @return 
	 */
	public function resetPassword(FakeRequest $request)
	{
		// the observer fires the onResetPasswordRequest Event we registered
		// on the index file(will normally be registered in a bootstrap file).
		$this->observer->announceAttachedListeners('onResetPasswordRequest');
	}

	/**
	 * Register the user to the application.
	 *
	 * @return void
	 */
	public function registerUser(FakeRequest $request)
	{
		// the observer fires the OnUserRegistration Event we registered
		// on the index file(will normally be registered in a bootstrap file).
		$this->observer->announceAttachedListeners('OnUserRegistration');
	} 
}



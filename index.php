<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\FakeRequest;
use App\Observers\Observer;
use App\Controllers\UserController;

use App\Listeners\UpdatePassword;
use App\Listeners\NotifyAdminListener;
use App\Listeners\NotifyUserListener;
use App\Listeners\WelcomeUserListener;

// Normally you would register the events in a specific location of the app
// for simplicity I register it here, as the app is booting.

/*
| Mostly will be located in a bootstrap file as the app is starting.
*/
$observer = new Observer;

$observer->attach('onResetPasswordRequest', [
					new UpdatePassword,
					new NotifyAdminListener,
					new NotifyUserListener,
				  ]);

$observer->attach('OnUserRegistration', new WelcomeUserListener);

/*
| Client Code
*/
// a request is made to reset the password
(new UserController($observer))->resetPassword(new FakeRequest);

// a request is made to register a user
(new UserController($observer))->registerUser(new FakeRequest);


/* Hopefully that simplifies this Design Pattern concept 
 * 
 *
 * Pros: 
 * - central location to edit the code
 * - cleans up the client code from nested if else statments
 *
 * Cons:
 * - it saves all events in the memory during runtime.
 *   perhaps only after a huge huge amounts of events registered 
 *   you will notice a slightly reduce of preformance.
 */

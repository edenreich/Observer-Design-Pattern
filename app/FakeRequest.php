<?php

namespace App;

class FakeRequest
{
	/**
	 * For now will just pretend a request was sent
	 * as an array of data.
	 *
	 * @return 
 	*/
	public function data()
	{
		return [
			'name' => 'examplename',
			'lastname' => 'examplelastname',
			'email' => 'example@email.com'
		];
	}
}
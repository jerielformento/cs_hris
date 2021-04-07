<?php

use REJ\Libs\User;
use REJ\System\Session;

class FinanceController extends REJController {

	public function indexAction() {
		return $this->view(array());
	}

}
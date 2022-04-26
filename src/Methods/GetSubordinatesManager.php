<?php
namespace Fc\Methods;

use Fc\Method;

class GetSubordinatesManager extends Method
{
	protected $_server = 'crm';
	protected $_uri    = 'get_subordinates_manager';

	public function email($email = "")
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->addError("Не правильная почта '$email'");
			return $this;
		}
		$this->addParam('email', $email);
		return $this;
	}
}

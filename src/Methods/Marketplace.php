<?php

	namespace Fc\Methods;

	use Fc\Interfaces\IMarketplace;
	use Fc\Method;

	class Marketplace extends Method implements IMarketplace
	{

		protected $_server = 'region';
		protected $_uri    = 'marketplace';

		public function name($marketplace_name)
		{
			if (!in_array($marketplace_name, ['wildberries', 'wildberries2', 'beru', 'beru2', 'ozon'])) {
				$this->addError("неправильное имя маркетплейса");
			}
			$this->addParam('marketplace_name', $marketplace_name);
			return $this;
		}

		public function getData()
		{
			$response = $this->getResponse();
			if (!$response['success'] || !isset($response['data'])) {
				throw new \RuntimeException();
			}
			return $response['data'];
		}
	}
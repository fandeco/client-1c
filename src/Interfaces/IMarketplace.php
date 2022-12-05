<?php
namespace Fc\Interfaces;

use RuntimeException;

interface IMarketplace{
	public function name($marketplace_name);

	/**
	 * @throws RuntimeException
	 * @return array
	 */
	public function getData();

}

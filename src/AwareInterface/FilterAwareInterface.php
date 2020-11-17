<?php

namespace CaS\SimplyGrid\AwareInterface;

/**
 * Filter aware interface
 */
interface FilterAwareInterface
{
	/**
	 * Render filter data
	 * @return string
	 */
	public function render(): string;
}
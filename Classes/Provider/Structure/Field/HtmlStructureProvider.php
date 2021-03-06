<?php
/*****************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Claus Due <claus@wildside.dk>, Wildside A/S
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 *****************************************************************/

/**
 * Raw HTML field structure provider
 *
 * @package Flux
 * @subpackage Provider/Structure
 */
class Tx_Flux_Provider_Structure_Field_HtmlStructureProvider extends Tx_Flux_Provider_Structure_AbstractStructureProvider implements Tx_Flux_Provider_StructureProviderInterface {

	/**
	 * @param array $configuration
	 * @return array
	 */
	public function render($configuration) {
		$fieldConfiguration = array(
			'type' => 'user',
			'userFunc' => 'EXT:flux/Classes/UserFunction/HtmlOutput.php:Tx_Flux_UserFunction_HtmlOutput->renderField',
			'parameters' => $configuration // will be pass to the UserFunction as argument
		);
		$fieldStructureArray = $this->getStandardFieldStructureArray($configuration, $fieldConfiguration);
		return $fieldStructureArray;
	}

}

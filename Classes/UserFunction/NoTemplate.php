<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Claus Due <claus@wildside.dk>, Wildside A/S
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 ***************************************************************/

/**
 * Renders nothing in case no template is selected
 *
 * @package Flux
 * @subpackage UserFunction
 */
class Tx_Flux_UserFunction_NoTemplate {

	/**
	 * @param array $parameters Not used
	 * @param object $pObj Not used
	 * @return string
	 */
	public function renderField(&$parameters, &$pObj) {
		unset($pObj, $parameters);
		if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['flux']['setup']['debugMode'] > 0) {
			return 'No FlexForm source selected. This is usually caused by incorrect template paths being returned by a ConfigurationProvider - in the
				case of FED/FluidContent/FluidPages this can also be caused by not having selected a page template or Fluid content element type, which
				can be considered a safe "error" that is only reported because debug mode is enabled in Flux. The parameters which lead to this error
				were: <br />' . var_export($parameters, TRUE);
		}
		return NULL;
	}
}

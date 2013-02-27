<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Steffen Roßkamp <sr@blackblizzard.org>, blackblizzard.org
 *
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
 * Content / PasteViewHelper
 *
 * @package Flux
 * @subpackage ViewHelpers\Be\Uri\Content
 */
class Tx_Flux_ViewHelpers_Be_Link_Content_PasteViewHelper extends Tx_Flux_Core_ViewHelper_AbstractBackendViewHelper {

	/**
	 * Render uri
	 *
	 * @return string
	 */
	public function render() {
			// Initialize Clipboard object:
		/**
		 * @var t3lib_clipboard $clipObj
		 */
		$clipObj = t3lib_div::makeInstance('t3lib_clipboard');
		$clipObj->initializeClipboard();
		$clipObj->lockToNormal();	// This locks the clipboard to the Normal for this request.
			// Update clipboard if some actions are sent.
		$CB = t3lib_div::_GET('CB');
		$clipObj->setCmd($CB);
		$clipObj->cleanCurrent();
		$clipObj->endClipboard();	// Saves
		if(!$clipObj->isElements()) {
			return '';
		}

		$pid = $this->arguments['row']['pid'];
		$uid = $this->arguments['row']['uid'];
		$area = $this->arguments['area'];
		$returnUri = $this->getReturnUri($pid);
		if ($area) {
			$returnUri .= '%23' . $area . '%3A' . $uid;
		}
		$icon = $this->getIcon('actions-document-paste-after', 'Paste content element after this position');
		$uri = $clipObj->pasteUrl('tt_content', -$uid, 0) . '&redirect=' . $returnUri;
		return $this->wrapLink($icon, $uri);
	}
}

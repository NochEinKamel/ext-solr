<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Ingo Renner <ingo@typo3.org>
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
 * Analysis search component
 *
 * @author Ingo Renner <ingo@typo3.org>
 * @package TYPO3
 * @subpackage solr
 */
class Tx_Solr_Search_AnalysisComponent extends Tx_Solr_Search_AbstractComponent implements Tx_Solr_QueryAware {

	/**
	 * Solr query
	 *
	 * @var Tx_Solr_Query
	 */
	protected $query;


	/**
	 * Initializes the search component.
	 *
	 *
	 */
	public function initializeSearchComponent() {
		if ($this->searchConfiguration['results.']['showDocumentScoreAnalysis']) {
			$this->query->setDebugMode();
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['solr']['modifyResultDocument']['scoreAnalysis'] = 'Tx_Solr_ResultDocumentModifier_ScoreAnalyzer';
		}
	}

	/**
	 * Provides the extension component with an instance of the current query.
	 *
	 * @param Tx_Solr_Query $query Current query
	 */
	public function setQuery(Tx_Solr_Query $query) {
		$this->query = $query;
	}

}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/Search/AnalysisComponent.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/Search/AnalysisComponent.php']);
}

?>
<?php
namespace Evoweb\Sessionplaner\Domain\Repository;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sebastian Fischer <typo3@evoweb.de>
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

class SessionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	/**
	 * Default Orderings
	 */
	protected $defaultOrderings = array(
	    'topic' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
	);
    
	/**
	 * @param $day \Evoweb\Sessionplaner\Domain\Model\Day
	 * @return array|\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	public function findByDayAndEmptySlot($day) {
		$query = $this->createQuery();

		$query->matching($query->logicalAnd($query->equals('day', $day), $query->equals('slot', 0)));

		return $query->execute();
	}
	
	/**
	 * @param string $days
	 * @return array|\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	public function findByDayAndHasSlotHasRoom($days) {
	    
	    $days = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $days);
	    if(is_array($days) && count($days) > 0){
		$query = $this->createQuery();
		$result = $query->matching(
		    $query->logicalAnd(
			$query->in('day', $days),
			$query->logicalNot($query->equals('slot',0)),
			$query->logicalNot($query->equals('room',0))
		    )
		)->execute();	    
	    }else{
		$result = NULL;
	    }
	    return $result;
	}
}

?>
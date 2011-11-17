<?php

namespace AdminDemo\Admin\Actions;

/* *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Action to create a new Being
 *
 * @version $Id: AbstractValidator.php 3837 2010-02-22 15:17:24Z robert $
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @FLOW3\Scope("prototype")
 */
class FakeSomeAction extends \Admin\Core\Actions\AbstractAction {
	
	/**
	 * Function to Check if this Requested Action is supported
	 * @author Marc Neuhaus <mneuhaus@famelo.com>
	 * */
	public function canHandle($being, $action = null, $id = false) {
		if(stristr($being, "AdminDemo\Domain\Model") && $action == "list" && !$id)
			return true;
		return false;
	}
	
	public function __toString() {
		return "Fake some!";
	}
	
	/**
	 * Create objects
	 *
	 * @param string $being
	 * @param array $ids
	 * @author Marc Neuhaus <mneuhaus@famelo.com>
	 * */
	public function execute($being, $ids = null) {
		for ($i=0; $i < 25; $i++) {
			$object = $this->adapter->getBeing($being);
			
			switch ($being) {
				case 'AdminDemo\Domain\Model\Company':
						$data = array(
							"name" => \AdminDemo\Faker\Company::name()
						);
					break;
			
				default:
					# code...
					break;
			}
			
			$result = $this->adapter->createObject($being, $data);
		}
		
		$arguments = array(
			"being" => $being
		);
		$this->controller->redirect('list', NULL, NULL, $arguments);
	}
}
?>
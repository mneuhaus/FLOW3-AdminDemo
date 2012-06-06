<?php

namespace AdminDemo\Domain\Repository;

/*                                                                        *
 * This script belongs to the FLOW3 package "Blog".                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @FLOW3\Scope("singleton")
 */
class PersonRepository extends \TYPO3\FLOW3\Persistence\Repository {
	/**
	 * @var \Admin\Security\SecurityManager
	 * @author Marc Neuhaus <apocalip@gmail.com>
	 * @FLOW3\Inject
	 */
	protected $securityManager;
	
	public function getByCurrentUser(){
		$user = $this->securityManager->getUser();
		if($user){
#			$query = $this->createQuery();
#			$query->matching($query->equals("user", $user->getIdentity()));
#			var_dump($user->getIdentity());
#			$person = $query->execute()->getFirst();
#			var_dump($query->count());
#			return $person;
			return $this->findOneByUser($user);
		}
		return null;
	}
}
?>
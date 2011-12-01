<?php
declare(ENCODING = 'utf-8');
namespace AdminDemo\Faker;

/*                                                                        *
 * This script belongs to the FLOW3 package "Faker".                      *
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

/**
 * Name class for the Faker package
 *
 * The Faker package is based on http://faker.rubyforge.org/
 *
 * @version $Id: Name.php 3100 2009-08-26 11:25:39Z k-fish $
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License', version 3 or later
 */
class Entity{
	static public function getRandom($shortName){
		$repository = self::getRepository($shortName);
		$query = $repository->createQuery();
		$query->setLimit(1);
		$query->setOffset(rand(0, $repository->countAll() - 1));
		return $query->execute()->getFirst();
	}
	
	static public function getRepository($shortName){
		$repository = sprintf("\AdminDemo\Domain\Repository\%sRepository", $shortName);
		return new $repository();
	}
}
?>
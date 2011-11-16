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
 * Date class for the Faker package
 *
 * The Faker package is based on http://faker.rubyforge.org/
 *
 * @version $Id: Date.php 3103 2009-08-27 10:25:59Z k-fish $
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License', version 3 or later
 */
class Date extends Faker {

	/**
	 * Create a random date $before and $after around $base, which defaults to
	 * 'now'. $before and $after are taken to be relative date strings.
	 *
	 * $base can be string, integer or \DateTime, if given.
	 *
	 * @param string $before a relative date
	 * @param string $after a relative date
	 * @param mixed $base the base date to randomize around
	 * @return \DateTime
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	static public function random($before = '- 1 week', $after = '+ 1 week', $base = NULL) {
		if ($base === NULL) {
			$baseDateTime = new \DateTime();
		} elseif (is_integer($base)) {
			$baseDateTime = new \DateTime();
			$baseDateTime->setTimeStamp($base);
		} elseif (is_string($base)) {
			$baseDateTime = new \DateTime($base);
		} elseif ($base instanceof \DateTime) {
			$baseDateTime = $base;
		} else {
			throw new \IllegalArgumentException('$base was neither NULL, integer, string, DateTime nor NULL. Duh!', 1251365710);
		}

		$startTimeStamp = strtotime($before, $baseDateTime->getTimeStamp());
		$endTimeStamp = strtotime($after, $baseDateTime->getTimeStamp());

		$result = new \DateTime();
		$result->setTimeStamp(rand($startTimeStamp, $endTimeStamp));
		return $result;
	}

}
?>
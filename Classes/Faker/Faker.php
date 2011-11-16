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
 * Faker class for the Faker package
 *
 * The Faker package is based on http://faker.rubyforge.org/
 *
 * @version $Id: Faker.php 3099 2009-08-26 10:43:29Z k-fish $
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License', version 3 or later
 */
class Faker {

	/**
	 * Replace all # characters in $string with a random digit.
	 *
	 * @param string $string
	 * @return string
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	static public function numerify($string) {
		return preg_replace('/#/e', 'rand(0,9)', $string);
	}

	/**
	 * Replace all ? characters in $string with a random char (a-z).
	 *
	 * @param string $string
	 * @return string
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	static public function letterify($string) {
		return preg_replace('/\?/e', 'chr(rand(97,122))', $string);
	}

	/**
	 * Return the combined result of letterify() and numerify().
	 *
	 * @param string $string
	 * @return string
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	static public function bothify($string) {
		return self::letterify(self::numerify($string));
	}

}
?>
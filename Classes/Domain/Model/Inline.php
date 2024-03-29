<?php

namespace AdminDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Contacts".                   *
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

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;
use Admin\Annotations as Admin;

/**
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("Testcases")
 */
class Inline extends \Admin\Core\Domain\Magic{
	
	/**
	 * @var \AdminDemo\Domain\Model\Address
	 * @ORM\ManyToOne(inversedBy="comments", cascade={"all"})
	 * @Admin\Inline()
	 * @Admin\Label("A single Address in stacked Layout")
	 */
	protected $addressStacked;
	
	/**
	 * @var \AdminDemo\Domain\Model\Address
	 * @ORM\ManyToOne(inversedBy="comments", cascade={"all"})
	 * @Admin\Inline()
	 * @Admin\Variant("Tabular")
	 */
	protected $addressTabular;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection<\AdminDemo\Domain\Model\Address>
	 * @ORM\ManyToMany(inversedBy="widgets_manytomany", cascade={"all"})
	 * @Admin\Inline()
	 */
	protected $addressesStacked;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection<\AdminDemo\Domain\Model\Address>
	 * @ORM\ManyToMany(inversedBy="widgets_manytomany", cascade={"all"})
	 * @Admin\Inline()
	 * @Admin\Variant("Tabular")
	 */
	protected $addressesTabular;
	
}

?>
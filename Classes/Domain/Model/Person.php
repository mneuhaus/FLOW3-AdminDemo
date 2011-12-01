<?php
namespace AdminDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Party".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;
use Admin\Annotations as Admin;

/**
 *
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("CRM")
 */
class Person extends \Admin\Core\Domain\Magic {
	/**
	 * @var string
	 */
	protected $firstname;
	
	/**
	 * @var string
	 */
	protected $lastname;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection<\TYPO3\Party\Domain\Model\ElectronicAddress>
	 * @ORM\ManyToMany
	 * @Admin\Inline
	 * @Admin\Variant("Tabular")
	 */
	protected $electronicAddresses;
	
	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\AdminDemo\Domain\Model\Project>
	 * @ORM\ManyToMany(mappedBy="persons")
	 * @Admin\Ignore("list")
	 * @Admin\Widget("Chosen")
	 */
	protected $projects;
	
	/**
	 * @var \Admin\Security\User
	 * @ORM\ManyToOne
	 * @Admin\Ignore("list")
	 * @Admin\Widget("Dropdown")
	 */
	protected $user;
	
	public function __toString(){
		return $this->firstname . " " . $this->lastname;
	}
	
	public function getAvatar(){
		$hash = md5("");
		
		foreach($this->electronicAddresses as $address){
			if($address->getType() == "email"){
				$hash = md5(strtolower($address->getIdentifier()));
			}
		}
		
		return "http://www.gravatar.com/avatar/" . $hash . "?s=128";
	}
}

?>
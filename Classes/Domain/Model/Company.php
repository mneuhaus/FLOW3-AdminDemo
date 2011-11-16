<?php
namespace AdminDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "AdminDemo".                  *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;
use Admin\Annotations as Admin;

/**
 * A Company
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("CRM")
 */
class Company extends \Admin\Core\Domain\Magic {
	
	/**
	 * @var string
	 */
	protected $name;
	
	/**
	 * @var \AdminDemo\Domain\Model\Note
	 * @ORM\ManyToOne(inversedBy="company")
	 */
	protected $notes;
	
	/**
	 * @var \AdminDemo\Domain\Model\Address
	 * @ORM\ManyToOne(inversedBy="company")
	 */
	protected $addresses;
	
}
?>
<?php
namespace AdminDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "AdminDemo".                  *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;
use Admin\Annotations as Admin;

/**
 * A Project
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("CRM")
 */
class Project extends \Admin\Core\Domain\Magic {
	
	/**
	 * @var string
	 * @FLOW3\Validate(type="String")
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $name;
	
	/**
	 * @var string
	 * @Admin\Widget("Textarea")
	 */
	protected $description;
	
	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\Admin\Security\User>
	 * @ORM\ManyToMany
	 * @Admin\Ignore("list")
	 */
	protected $users;
}
?>
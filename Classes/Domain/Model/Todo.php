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
 * A Todo
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Todo {
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
	 * @var \Doctrine\Common\Collections\ArrayCollection<\AdminDemo\Domain\Model\Project>
	 * @ORM\ManyToMany
	 * @Admin\Ignore("list")
	 */
	protected $projects;
	
}
?>
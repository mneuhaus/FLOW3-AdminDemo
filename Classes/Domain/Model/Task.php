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
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("CRM")
 */
class Task extends \Admin\Core\Domain\Magic {
	/**
	 * @var string
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $name;
	
	/**
	 * @var string
	 * @Admin\Widget("Textarea")
	 * @Admin\Ignore("inline")
	 */
	protected $description;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection<\AdminDemo\Domain\Model\Project>
	 * @ORM\ManyToMany(mappedBy="tasks", cascade={"all"})
	 * @Admin\Ignore("inline")
	 */
	protected $projects;
	
}
?>
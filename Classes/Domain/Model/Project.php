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
	 * @var \Doctrine\Common\Collections\ArrayCollection<\AdminDemo\Domain\Model\Person>
	 * @ORM\ManyToMany(inversedBy="projects")
	 * @Admin\Ignore("list")
	 * @Admin\Widget("Chosen")
	 */
	protected $persons;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection<\AdminDemo\Domain\Model\Task>
	 * @ORM\ManyToMany(inversedBy="project", cascade={"all"})
	 * @Admin\Inline
	 * @Admin\Variant("Tabular")
	 */
	protected $tasks;
}
?>
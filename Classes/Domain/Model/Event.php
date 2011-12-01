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
 * @Admin\Label("Calendar")
 * @Admin\Variant(variant="Calendar", options="Calendar, List")
 * @Admin\VariantMapping(start="startdate", end="enddate")
 */
class Event extends \Admin\Core\Domain\Magic {
	
	/**
	 * @var string
	 * @FLOW3\Validate(type="String")
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $title;
	
	/**
	 * @var \DateTime
	 */
	protected $startdate;
	
	/**
	 * @var \DateTime
	 */
	protected $enddate;
	
	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\AdminDemo\Domain\Model\Person>
	 * @ORM\ManyToMany
	 * @Admin\Ignore("list")
	 * @Admin\Widget("Chosen")
	 */
	protected $persons;
}
?>
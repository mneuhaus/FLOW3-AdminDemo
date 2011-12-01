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
 * A Variants
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("Testcases")
 * 
 * @Admin\Variant(variant="Calendar", options="Calendar, List")
 * @Admin\VariantMapping(title="name", start="startdate", end="enddate")
 */
class Variants extends \Admin\Core\Domain\Magic{
		/**
		 * @var string
		 * @FLOW3\Identity
		 */
		protected $name;

		/**
		 * @var \DateTime
		 */
		protected $startdate;
		
		/**
		 * @var \DateTime
		 */
		protected $enddate;
		
		/**
		 * @var \TYPO3\FLOW3\Resource\Resource
		 * @ORM\OneToOne()
		 */
		protected $resource;
		
		/**
		 * @var string
		 * @Admin\Widget("Textarea")
		 */
		protected $description;
}
?>
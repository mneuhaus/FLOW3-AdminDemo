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
 * A Message
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("CRM")
 * @Admin\Variant("Panes")
 * @Admin\VariantMapping(title="subject", subtitle="sender", content="content", image="avatar")
 */
class Message extends \Admin\Core\Domain\Magic{
	
	/**
	 * @var \AdminDemo\Domain\Model\Person
	 * @ORM\ManyToOne
	 * @Admin\Ignore("create,update")
	 */
	protected $sender;
	
	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\AdminDemo\Domain\Model\Person>
	 * @ORM\ManyToMany
	 * @Admin\Widget("Chosen")
	 */
	protected $receipients;

	/**
	 * @var string
	 */
	protected $subject;
		
	/**
	 * @var string
	 * @Admin\Widget("Textarea")
	 */
	protected $content;
	
	/**
	 *
	 * @param \AdminDemo\Domain\Repository\PersonRepository $personRepository 
	 * @author Marc Neuhaus
	 */
	public function __construct(){
		$personRepository = new \AdminDemo\Domain\Repository\PersonRepository();
		$this->sender = $personRepository->getByCurrentUser();
	}
	
	public function getAvatar(){
		$options = array("abstract", "animals", "city", "nightlife", "fashion", "people", "nature", "sports", "technics");
		return "http://lorempixel.com/128/128/" . $options[rand(0,count($options) - 1)];
	}
}
?>
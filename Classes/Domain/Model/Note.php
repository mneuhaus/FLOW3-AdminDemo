<?php
namespace AdminDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "AdminDemo".                  *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Note
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Note {

	/**
	 * @var string
	 */
	protected $content;
	
	/**
	 * @var \AdminDemo\Domain\Model\Company
	 * @ORM\ManyToOne(inversedBy="notes")
	 */
	protected $company;

}
?>
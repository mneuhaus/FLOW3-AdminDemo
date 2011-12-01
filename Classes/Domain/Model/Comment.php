<?php
namespace AdminDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "AdminDemo".                  *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Comment
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Comment extends \Admin\Core\Domain\Magic {
	
	/**
	 * @var string
	 */
	protected $content;
	
}
?>
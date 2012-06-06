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
 * A Address
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 * @Admin\Active
 * @Admin\Group("CRM")
 */
class Address extends \Admin\Core\Domain\Magic {
	
	/**
	 * @var string
	 * @FLOW3\Validate(type="String")
	 * @FLOW3\Validate(type="NotEmpty")
	 * @Admin\Search
	 */
	protected $street;
	
	/**
	 * @var string
	 */
	protected $housenumber;
	
	/**
	 * @var string
	 */
	protected $zip;
	
	/**
	 * @var string
	 * @FLOW3\Validate(type="String")
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $city;
	
	/**
	 * @var string
	 * @Admin\Filter
	 */
	protected $country;
	
	
	public function __toString(){
		return sprintf("%s %s, %s %s", $this->street, $this->housenumber, $this->zip, $this->city);
	}
}
?>
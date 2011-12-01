<?php
namespace AdminDemo\Forms;

/*                                                                        *
 * This script belongs to the FLOW3 package "AdminDemo".                  *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Admin\Annotations as Admin;

/**
 *
 * @package default
 * @author Marc Neuhaus
 * @FLOW3\Scope("prototype")
 */
class TestForm {
	/**
	 * @var string
	 */
	protected $sender;
	
	/**
	 * @var string
	 */
	protected $subject;
	
	/**
	 * @var string
	 * @Admin\Widget("Textarea")
	 */
	protected $content;
	
	public function getSender(){
		return $this->sender;
	}
	
	public function setSender($value){
		$this->sender = $value;
	}
	
	public function getSubject(){
		return $this->subject;
	}
	
	public function setSubject($value){
		$this->subject = $subject;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function setContent($value){
		$this->content = $value;
	}
}

?>
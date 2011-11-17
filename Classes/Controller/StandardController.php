<?php
namespace AdminDemo\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "AdminDemo".                  *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Admin\Annotations as Admin;

/**
 * Standard controller for the AdminDemo package 
 *
 * @FLOW3\Scope("singleton")
 */
class StandardController extends \TYPO3\FLOW3\MVC\Controller\ActionController {

	/**
	 * Index action
	 *
	 * @return void
	 * @Admin\Navigation(title="Overview", position="top", priority="10000")
	 */
	public function indexAction() {
		\Admin\Core\API::setTitle("Admin Overview");
		// \Admin\Core\API::addNavigationItem("", "left", array(
		// 	"action" => 
		// ));
	}

}

?>
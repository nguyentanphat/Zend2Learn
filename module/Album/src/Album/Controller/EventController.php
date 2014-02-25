<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Album\Controller\Event\Example;
use Zend\EventManager\SharedEventManager;

class EventController extends AbstractActionController {

	public function indexAction() {
		$example = new Example();
		$sharedEvents = new SharedEventManager();
		$example->getEventManager()->setSharedManager($sharedEvents);
// 		var_dump ( $example );
// 		exit ();
		$example->getEventManager ()->attach ('doz', function ($e) {
			$event = $e->getName ();
			$target = get_class ( $e->getTarget () ); // "Example"
			$params = $e->getParams ();
			echo 'Handled event ' . $event . ' on target ' . $target . ', with parameters' . json_encode ( $params );
		} );
		
// 		var_dump($example);
		$sharedEvents->attach('Album\Controller\Event\Example', 'doz', function ($e){
			echo '<br>jump to share<br>';
			$event = $e->getName();
			$target = get_class($e->getTarget());//example
			$params = $e->getParams();
// 			var_dump($params);
			echo 'chao mung ban de thuc hien event thanh cong '.$event.' on target'.$target.'with parameters'.json_encode ( $params );
		}
			);
			$example->doz ( 'bar', 'bat' );
		exit();
	}
}
	
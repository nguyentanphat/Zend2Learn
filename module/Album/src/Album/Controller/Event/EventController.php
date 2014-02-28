<?php

namespace Album\Controller\Event;

use Album\Controller\Event\Example;
use Zend\EventManager\SharedEventManager;
use Zend\EventManager\StaticEventManager;
use Zend\Mvc\Controller\AbstractRestfulController;

class EventController extends AbstractRestfulController {

	public function get($id) {
		$example = new Example();
// 		$sharedEvents = new SharedEventManager();
		$example->getEventManager()->setSharedManager($sharedEvents);
		$example->getEventManager()->attach ('doz', function ($e) {
			$event = $e->getName ();
			$target = get_class ( $e->getTarget () ); // "Example"
			$params = $e->getParams ();
			echo 'Handled event ' . $event . ' on target ' . $target . ', with parameters' . json_encode ( $params );
		} );
		                                                                                                                                                                                                                       
// 		$sharedEvents->attach('Album\Controller\Event\Example', 'doz', function ($e){
// 			echo '<br>jump to share<br>';
// 			$event = $e->getName();
// 			$target = get_class($e->getTarget());//example
// 			$params = $e->getParams();
// 			echo 'chao mung ban de thuc hien event thanh cong '.$event.' on target'.$target.'with parameters'.json_encode ( $params );
// 		}
// 			);
			$example->doz ( 'bar', 'bat' );
		exit();
	}
}
	
<?php
namespace Album\Controller\Event;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;


class Example implements EventManagerAwareInterface{
	protected $events;
	public function setEventManager(EventManagerInterface $events) {
		$events->setIdentifiers ( array (
				__CLASS__,
				get_class ( $this )
		) );
// 		$events->addIdentifiers(array(
// 				get_called_class()
// 		));
		$this->events = $events;
	}
	public function getEventManager() {
		if (! $this->events) {
			$this->setEventManager ( new EventManager() );
		}
		return $this->events;
	}
	public function doz($foo, $baz) {
		$params = compact ( 'foo', 'baz' );
		$this->getEventManager ()->trigger (__FUNCTION__, $this, $params );
// 		var_dump($params);
	}
}
	
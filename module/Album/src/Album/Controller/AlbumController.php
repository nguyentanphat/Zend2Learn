<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album; // <-- Add this import
use Album\Form\AlbumForm; // <-- Add this import
use Album\Controller\VirtualController\AlbumControllerVirtual;
class AlbumController extends AbstractActionController{
	private $virtual_controller;
	private $data_table;
	public function indexAction() {
		$this->virtual_controller = new AlbumControllerVirtual();
		if($this->virtual_controller->is_album_table()){
		$sm= $this->getServiceLocator()//->get( 'Album\Model\AlbumTable' );
		var_dump($sm);exit();
		$this->data_table=$this->virtual_controller->fetch_data_album_table($sm);
		}
		return new ViewModel ( array (
				'albums' => $this->data_table,//$this->getAlbumTable ()->fetchAll () 
		) );
	}
// 	public function addAction() {
// 		$form = new AlbumForm();
// 		$form->get ( 'submit' )->setValue ( 'Add' );
		
// 		$request = $this->getRequest ();
// 		if ($request->isPost ()) {
// 			$album = new Album ();
// 			$form->setInputFilter ( $album->getInputFilter () );
// 			$form->setData ( $request->getPost () );
			
// 			if ($form->isValid ()) {
// 				$album->exchangeArray ( $form->getData () );
// 				$this->getAlbumTable ()->saveAlbum ( $album );
				
// 				// Redirect to list of albums
// 				return $this->redirect ()->toRoute ( 'album' );
// 			}
// 		}
// 		return array (
// 				'form' => $form 
// 		);
// 	}
}

<?php
namespace Album\Controller\VirtualController;

class AlbumControllerVirtual{
	protected $album_table;
	public function __construct(){
		$this->album_table = null;
	}
	public function is_album_table(){
		if(!$this->album_table){
			return true;
		}else {
			return false;
		}
	}
	public function fetch_data_album_table($sm) {
		$fetch_data = $sm->fetchAll();
		return $fetch_data;
	}
}
<?php
App::uses( 'AppModel', 'Model' ) ;
class Note extends AppModel {
	// public $useTable = false;
	public $validate = array(
			//'title' => 'notEmpty' ,
			'title' => array(
					'rule' => 'notBlank' ,
					'message' => 'Không được để trống trường này!'
			) ,
			'content' => array(
					'rule' => 'notBlank' ,
					'message' => 'Không được để trống trường này!'
			)
	);
}

?>
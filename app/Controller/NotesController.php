<?php
App::uses( 'AppController', 'Controller' ) ;
class NotesController extends AppController {
	public function index() {
        $notes = $this->Note->find('all');
        $this->set('notes' , $notes);
	}
    
    public function view($id = null) {
        if ($this->Note->exists()) {
            
        }
    }
}
?>
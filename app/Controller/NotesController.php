<?php
App::uses( 'AppController', 'Controller' ) ;
class NotesController extends AppController {
	public function index() {
        $notes = $this->Note->find('all' , array(
            'order' => array('Note.created' => 'asc') ,
            'fields' => array('id' , 'title')
        ));
        $this->set('notes' , $notes);
	}
    
    public function view($id = null) {
        // Kiem tra id co ton tai trong note nao hay khong
        $this->Note->id = $id;
        //pr($this->Note->id);
        if ($this->Note->exists()) { // Kiem tra note co ton tai trong csdl hay khong
            $note_1 = $this->Note->findById($id); // Tra ve tat ca data cua note co id = $id
            
            // $this->Note->read(Ten truong muon lay , id dua vao)
            $note_2 = $this->Note->read(null , $id);
            $this->set('note' , $note_2);
        } else {
            throw new NotFoundException('Không tồn tại ghi chú này !');
        }
    }
    
    public function edit($id = null) {
    	$this->Note->id = $id;
    	if ($this->request->is('post')) {
    		$note = $this->request->data;
    	} else {
    		$note = $this->Note->findById($id);
    		$this->set('note' , $note);
    	}
    	
    }
}
?>
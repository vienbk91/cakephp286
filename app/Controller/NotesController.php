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
		
		if ($this->Note->exists()) {
			//pr($this->request->method());
			if ($this->request->is('post')) {
				$note = $this->request->data;
				if ($this->Note->save($note)) {
					$this->Flash->success('Lưu thành công !');
					$this->redirect(array('controller' => 'notes' , 'action' => 'index'));
				} else {
					$this->Flash->error('Không thể thay đổi được nội dung ! Hãy thực hiện lại.');
					$note = $this->Note->findById($id);
					$this->set('note' , $note);
				}
			} else {
				$note = $this->Note->findById($id);
				$this->set('note' , $note);
			}
		} else {
			throw new NotFoundException('Không tìm thấy ghi chú này!');
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$note = $this->request->data;
			$this->Note->set($note);
			if ($this->Note->validates()) {
				if ($this->Note->save($note)) {
					$this->Flash->success('Tạo ghi chú thành công !');
					$this->redirect(array('controller' => 'notes' , 'action' => 'index'));
				} else {
					$this->Flash->error('Thêm ghi chú thất bại ! Hãy thực hiện lại.');
					$this->set('note' , $note);
				}
			} else {
				$error = $this->Note->validationErrors;
				$this->set('error' , $error);
				$this->set('note' , $note);
			}
		}
	}

	public function delete($id = null) {
		$this->Note->id = $id;
		
		if ($this->Note->exists()) {
			if ($this->Note->delete($id)) {
				$this->Flash->success('Xóa ghi chú thành công !');
				$this->redirect(array('controller' => 'notes' , 'action' => 'index'));
			} else {
				$this->Flash->success('Xóa ghi chú thất bại !');
				$this->redirect(array('controller' => 'notes' , 'action' => 'view' , 'param1' => $id));
			}
		} else {
			throw new NotFoundException('Không tìm thấy ghi chú này!');
		}
	}
}
?>
<?
class MoviesController extends AppController {
  public $helpers = array ('Html','Form');
  /* Controller dos vídeos
   * Ações: Listagem, exibição, adição, edição, exclusão
  */

  public function beforeFilter() {
    parent::beforeFilter();
  }

  public function index() {
    $this->Movie->recursive = 0;
    $this->set('movies', $this->paginate());
  }

  public function view($id = null) {
    $this->Movie->id = $id;
    if (!$this->Movie->exists()) {
      throw new NotFoundException(__('Invalid movie'));
    }
    $this->set('movie', $this->Movie->read());
    $this->Movie->updateViewCount();
  }

  public function add() {
    if ($this->request->is('post')) {
      $this->Movie->create();
      if ($this->Movie->save($this->request->data)) {
        $this->Session->setFlash(__('The movie has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The movie could not be saved. Please, try again.'));
      }
    }
  }

  public function edit($id = null) {
    $this->Movie->id = $id;
    if (!$this->Movie->exists()) {
      throw new NotFoundException(__('Invalid movie'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Movie->save($this->request->data)) {
        $this->Session->setFlash(__('The movie has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The movie could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->Movie->read(null, $id);
      unset($this->request->data['Movie']['password']);
    }
  }

  public function delete($id = null) {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $this->Movie->id = $id;
    if (!$this->Movie->exists()) {
      throw new NotFoundException(__('Invalid movie'));
    }
    if ($this->Movie->delete()) {
      $this->Session->setFlash(__('Movie deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Movie was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
}

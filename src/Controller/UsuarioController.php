<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Usuario Controller
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuarioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
           $usuarioTable = TableRegistry::getTableLocator()->get('Usuario');
        $usuario = $this->paginate($usuarioTable);
        
       //deixar mensagem
       if($usuario){
        return $this->response
        ->withType('application/json')
        ->withStatus(200)
        ->withStringBody(json_encode($usuario));
        //$this->set(compact('usuario'));
        
        }else{
            return $this->response
                ->withStatus(404)
                ->withType('application/json')
                ->withStringBody(json_encode(['msg'=>'Nenhum usuario foi cadastrado.']));
                
        }
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuarioTable = TableRegistry::getTableLocator()->get('Usuario');
        $Usuario = $usuarioTable
        ->find('all')
        ->where(['id'=> $id])
        ->toArray();

        if($Usuario){
           return $this->response
           ->withStatus(200)
            ->withType('application/json')
            ->withStringBody(json_encode($Usuario));
            
        }else{
         return  $this->response
           ->withStatus(404)
           ->withType('application/json')
           ->withStringBody(json_encode(['msg'=>'Este Usuario não existe.']));

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is(['post', 'ajax', 'patch'])) {
            $usuarioTable = TableRegistry::getTableLocator()->get('Usuario');
            $usuario = $usuarioTable->newEntity($this->request->getData());
            $usuario = $usuarioTable->patchEntity($usuario, $this->request->getData());
    
            if ($usuarioTable->save($usuario)) {
                $this->response = $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode(['msg' => 'O Usuario foi cadastrado com sucesso.']));
            } else {
                $this->response = $this->response
                    ->withStatus(404)
                    ->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'O Usuario não foi cadastrado.']));
            }
        }
    
        return $this->response;
    }  

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuarioTable = TableRegistry::getTableLocator()->get('Usuario');
        $usuario = $usuarioTable->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $usuarioTable->patchEntity($usuario, $this->request->getData());
            if ($usuarioTable->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $usuarioTable = TableRegistry::getTableLocator()->get('Usuario');
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $usuarioTable->get($id);
        if ($usuarioTable->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cargo Controller
 *
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CargoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cargo = $this->paginate($this->cargo);
        
        //deixar mensagem
        if($cargo){
         return $this->response
         ->withType('application/json')
         ->withStatus(200)
         ->withStringBody(json_encode($cargo));
         //$this->set(compact('cargo'));
         
         }else{
             return $this->response
                 ->withStatus(404)
                 ->withType('application/json')
                 ->withStringBody(json_encode(['msg'=>'Nenhum cargo foi cadastrado.']));
                 
         }
    }

    /**
     * View method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cargo = $this->Cargo->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cargo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cargo = $this->Cargo->newEmptyEntity();
        if ($this->request->is('post')) {
            $cargo = $this->Cargo->patchEntity($cargo, $this->request->getData());
            if ($this->Cargo->save($cargo)) {
                $this->Flash->success(__('The cargo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cargo could not be saved. Please, try again.'));
        }
        $this->set(compact('cargo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cargo = $this->Cargo->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Cargo->patchEntity($cargo, $this->request->getData());
            if ($this->Cargo->save($cargo)) {
                $this->Flash->success(__('The cargo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cargo could not be saved. Please, try again.'));
        }
        $this->set(compact('cargo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cargo = $this->Cargo->get($id);
        if ($this->Cargo->delete($cargo)) {
            $this->Flash->success(__('The cargo has been deleted.'));
        } else {
            $this->Flash->error(__('The cargo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Vaga Controller
 *
 * @method \App\Model\Entity\Vaga[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VagaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $vaga = $this->paginate($this->Vaga);

      //deixar mensagem
      if($vaga){
        return $this->response
        ->withType('application/json')
        ->withStatus(200)
        ->withStringBody(json_encode($vaga));
        //$this->set(compact('vaga'));
        
        }else{
            return $this->response
                ->withStatus(404)
                ->withType('application/json')
                ->withStringBody(json_encode(['msg'=>'Nenhum vaga foi cadastrado.']));
                
        }
    }

    /**
     * View method
     *
     * @param string|null $id Vaga id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vaga = $this->Vaga->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('vaga'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vaga = $this->Vaga->newEmptyEntity();
        if ($this->request->is('post')) {
            $vaga = $this->Vaga->patchEntity($vaga, $this->request->getData());
            if ($this->Vaga->save($vaga)) {
                $this->Flash->success(__('The vaga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vaga could not be saved. Please, try again.'));
        }
        $this->set(compact('vaga'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vaga id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vaga = $this->Vaga->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vaga = $this->Vaga->patchEntity($vaga, $this->request->getData());
            if ($this->Vaga->save($vaga)) {
                $this->Flash->success(__('The vaga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vaga could not be saved. Please, try again.'));
        }
        $this->set(compact('vaga'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vaga id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vaga = $this->Vaga->get($id);
        if ($this->Vaga->delete($vaga)) {
            $this->Flash->success(__('The vaga has been deleted.'));
        } else {
            $this->Flash->error(__('The vaga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

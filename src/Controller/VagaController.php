<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
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
        
        $vagaTable = TableRegistry::getTableLocator()->get('Vaga');
        $vaga = $this->paginate($vagaTable);

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
        $vagaTable = TableRegistry::getTableLocator()->get('Vaga');

        $Vaga =$vagaTable
        ->find('all')
        ->where(['id'=> $id])
        ->toArray();

        if($Vaga){
           return $this->response
           ->withStatus(200)
            ->withType('application/json')
            ->withStringBody(json_encode($Vaga));
            
        }else{
         return  $this->response
           ->withStatus(404)
           ->withType('application/json')
           ->withStringBody(json_encode(['msg'=>'Este Vaga não existe.']));

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
/**
 * Add method
 *
 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
 */
public function add()
{
    if ($this->request->is(['post', 'ajax', 'patch'])) {
        $vagaTable = TableRegistry::getTableLocator()->get('Vaga');

        $vaga = $vagaTable->newEntity($this->request->getData());
        $vaga = $vagaTable->patchEntity($vaga, $this->request->getData());

        if ($vagaTable->save($vaga)) {
            $this->response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(['msg' => 'A Vaga foi cadastrada com sucesso.']));
        } else {
            $this->response = $this->response
                ->withStatus(404)
                ->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'A Vaga não foi cadastrada.']));
        }
    }
    return $this->response;
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
        $vagaTable = TableRegistry::getTableLocator()->get('Vaga');

        $vaga =$vagaTable->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vaga =$vagaTable->patchEntity($vaga, $this->request->getData());
            if ( $vagaTable->save($vaga)) {
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
        $vagaTable = TableRegistry::getTableLocator()->get('Vaga');

        $this->request->allowMethod(['post', 'delete']);
        $vaga =$vagaTable->get($id);
        if ( $vagaTable->delete($vaga)) {
            $this->Flash->success(__('The vaga has been deleted.'));
        } else {
            $this->Flash->error(__('The vaga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

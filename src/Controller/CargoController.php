<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
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
        $cargoTable = TableRegistry::getTableLocator()->get('Cargo');

        $cargo = $this->paginate(  $cargoTable);
        
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
        $cargoTable = TableRegistry::getTableLocator()->get('Cargo');

        $Cargo =$cargoTable
        ->find('all')
        ->where(['id'=> $id])
        ->toArray();

        if($Cargo){
           return $this->response
           ->withStatus(200)
            ->withType('application/json')
            ->withStringBody(json_encode($Cargo));
            
        }else{
         return  $this->response
           ->withStatus(404)
           ->withType('application/json')
           ->withStringBody(json_encode(['msg'=>'Este Cargo não existe.']));

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->request->is(['post','ajax','patch'])){
            $cargoTable = TableRegistry::getTableLocator()->get('Cargo');

            $Cargo =$cargoTable->newEntity($this->request->getData());
            $Cargo =$cargoTable->patchEntity($Cargo, $this->request->getData());
           
                if ($this->Cargo->save($Cargo)) {
                  
                    return $this->response
                    
                     ->withType('application/json')
                     ->withStatus(200)
                     ->withStringBody(json_encode(['msg'=>'O Cargo  foi cadastrado com sucesso.']));
                 
                }else{
                return $this->response
                ->withStatus(404)
                 ->withType('application/json')
                 ->withStringBody(json_encode(['msg'=>'O Cargo não foi cadastrado.']));
            }
            }
            return $this->response;
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
        $cargoTable = TableRegistry::getTableLocator()->get('Cargo');

        $cargo =$cargoTable->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo =$cargoTable->patchEntity($cargo, $this->request->getData());
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
        $cargoTable = TableRegistry::getTableLocator()->get('Cargo');

        $this->request->allowMethod(['post', 'delete']);
        $cargo =$cargoTable->get($id);
        if ($this->Cargo->delete($cargo)) {
            $this->Flash->success(__('The cargo has been deleted.'));
        } else {
            $this->Flash->error(__('The cargo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

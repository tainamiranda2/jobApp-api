<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Empresa Controller
 *
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpresaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $empresaTable = TableRegistry::getTableLocator()->get('Empresa');
        $empresa = $this->paginate($empresaTable);
       //deixar mensagem
        if($empresa){
         return $this->response
         ->withType('application/json')
         ->withStatus(200)
         ->withStringBody(json_encode($empresa));
         //$this->set(compact('empresa'));
         
         }else{
             return $this->response
                 ->withStatus(404)
                 ->withType('application/json')
                 ->withStringBody(json_encode(['msg'=>'Nenhum empresa foi cadastrado.']));
                 
         }
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresaTable = TableRegistry::getTableLocator()->get('Empresa');

        $Empresa =$empresaTable
        ->find('all')
        ->where(['id'=> $id])
        ->toArray();

        if($Empresa){
           return $this->response
           ->withStatus(200)
            ->withType('application/json')
            ->withStringBody(json_encode($Empresa));
            
        }else{
         return  $this->response
           ->withStatus(404)
           ->withType('application/json')
           ->withStringBody(json_encode(['msg'=>'Este Empresa não existe.']));

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
            $empresaTable = TableRegistry::getTableLocator()->get('Empresa');

            $Empresa =$empresaTable->newEntity($this->request->getData());
            $Empresa =$empresaTable->patchEntity($Empresa, $this->request->getData());
           
                if ($this->Empresa->save($Empresa)) {
                  
                    return $this->response
                    
                     ->withType('application/json')
                     ->withStatus(200)
                     ->withStringBody(json_encode(['msg'=>'O Empresa  foi cadastrado com sucesso.']));
                 
                }
                return $this->response
                ->withStatus(404)
                 ->withType('application/json')
                 ->withStringBody(json_encode(['msg'=>'O Empresa não foi cadastrado.']));
              
            }
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresaTable = TableRegistry::getTableLocator()->get('Empresa');

        $empresa =$empresaTable->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa =$empresaTable->patchEntity($empresa, $this->request->getData());
            if ($this->Empresa->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
        }
        $this->set(compact('empresa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $empresaTable = TableRegistry::getTableLocator()->get('Empresa');

        $this->request->allowMethod(['post', 'delete']);
        $empresa =$empresaTable->get($id);
        if ($this->Empresa->delete($empresa)) {
            $this->Flash->success(__('The empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The empresa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vaga Model
 *
 * @method \App\Model\Entity\Vaga newEmptyEntity()
 * @method \App\Model\Entity\Vaga newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vaga[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vaga get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vaga findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vaga patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vaga[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vaga|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vaga saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vaga[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vaga[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vaga[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vaga[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VagaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vaga');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('cargo_id')
            ->requirePresence('cargo_id', 'create')
            ->notEmptyString('cargo_id');

        $validator
            ->dateTime('data_inicial')
            ->requirePresence('data_inicial', 'create')
            ->notEmptyDateTime('data_inicial');

        $validator
            ->integer('empresa_id')
            ->requirePresence('empresa_id', 'create')
            ->notEmptyString('empresa_id');

        $validator
            ->scalar('resposta')
            ->maxLength('resposta', 20)
            ->allowEmptyString('resposta');
            
        $validator
        ->scalar('motivo')
        ->maxLength('motivo', 200)
        ->allowEmptyString('motivo');
        
        $validator
            ->scalar('status')
            ->maxLength('status', 200)
            ->allowEmptyString('status');

            $validator
            ->scalar('nome')
            ->maxLength('nome', 200)
            ->allowEmptyString('nome');

        $validator
            ->dateTime('data_final')
            ->requirePresence('data_final', 'create')
            ->notEmptyDateTime('data_final');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');

        $validator
            ->requirePresence('nickname', 'create')
            ->notEmpty('nickname');

        $validator
            ->requirePresence('avator', 'create')
            ->notEmpty('avator');

        $validator
            ->requirePresence('access_token', 'create')
            ->notEmpty('access_token');

        $validator
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->allowEmpty('updated_at');

        return $validator;
    }
}

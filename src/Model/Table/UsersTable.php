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

        $this->hasMany('Threads', [
            'foreignKey' => 'actor_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'actor_id'
        ]);

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
            ->notEmpty('id');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->add('uid', 'unique', ['rule' => 'isUnique'])
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');

        $validator
            ->requirePresence('nickname', 'create')
            ->notEmpty('nickname');

        $validator
            ->requirePresence('avatar', 'create')
            ->notEmpty('avatar');

        $validator
            ->requirePresence('access_token', 'create')
            ->notEmpty('access_token');

        return $validator;
    }
}

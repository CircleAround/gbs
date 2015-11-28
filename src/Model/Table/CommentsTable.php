<?php
namespace App\Model\Table;

use App\Model\Entity\Comment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Comments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Threads
 * @property \Cake\ORM\Association\BelongsTo $Actors
 */
class CommentsTable extends Table
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

        $this->table('comments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Threads', [
            'foreignKey' => 'thread_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Actors', [
            'className' => 'Users',
            'foreignKey' => 'actor_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Comment_Reactions', [
            'foreignKey' => 'comment_id',
            'sort' => ['Comment_Reactions.created_at' => 'DESC'],
        ]);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created_at' => 'new',
                    'updated_at' => 'always',
                ]
            ]
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
            ->allowEmpty('id', 'create');

        $validator
            ->add('thread_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('thread_id', 'create')
            ->notEmpty('thread_id');

        $validator
            ->add('actor_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('actor_id', 'create')
            ->notEmpty('actor_id');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['thread_id'], 'Threads'));
        $rules->add($rules->existsIn(['actor_id'], 'Actors'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\CommentReaction;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CommentReactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Comments
 * @property \Cake\ORM\Association\BelongsTo $Actors
 */
class CommentReactionsTable extends Table
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

        $this->table('comment_reactions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Comments', [
            'foreignKey' => 'comment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Actors', [
            'foreignKey' => 'actor_id',
            'joinType' => 'INNER'
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
            ->add('kind', 'valid', ['rule' => 'numeric'])
            ->requirePresence('kind', 'create')
            ->notEmpty('kind');

        $validator
            ->add('value', 'valid', ['rule' => 'numeric'])
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        $validator
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->allowEmpty('updated_at');

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
        $rules->add($rules->existsIn(['comment_id'], 'Comments'));
        $rules->add($rules->existsIn(['actor_id'], 'Actors'));
        return $rules;
    }
}

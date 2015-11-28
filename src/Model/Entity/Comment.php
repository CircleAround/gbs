<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Comment Entity.
 */
class Comment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to true, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * doReaction method
     *
     * comment_reactionsで comment_reactions.actor_idが自分自身でかつ、
     * comment_reactions.type=$reactionsのものが既にDB内にあれば何もしない
     * そうでなければ、comment_reactions を下記の条件で作成する
     * comment_reactions.actor_id = $actor->id
     * comment_reactions.type=$reactions
    */
    public function doReaction($actor, $reactions)
    //actorはUserのインスタンスとする、comment_idも入れています
    {
        // DBに既にあれば登録しない
        $Comment_Reactions = TableRegistry::get('Comment_Reactions')->find();
        $result = $Comment_Reactions->where(['comment_id'=>$this->id, 'actor_id' => $actor->id, 'kind' => $reactions])->first();

        if ($result == null) {
            $Comment_Reactions = TableRegistry::get('Comment_Reactions');
            $new_reaction = $Comment_Reactions->newEntity();
            $data = [
                'comment_id' => $this->id,
                'actor_id' => $actor->id,
                'kind' => $reactions
            ];
            $new_reaction->set($data);
            $Comment_Reactions->save($new_reaction);
        }
    }

    public function good_question($actor)
    {
        return doReaction($actor, Reactions::$GOOD_QUESTION);
    }

    public function nice_advise($actor)
    {
        return doReaction($actor, Reactions::$NICE_ADVISE);
    }

    public function answer($actor)
    {
        return doReaction($actor, Reactions::$ANSWER);

    }
  }

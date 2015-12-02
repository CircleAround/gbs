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
     * actorはUserのインスタンスとする
    **/
    public function doReaction($actor, $reactions)
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

    public function labelGoodQuestion($actor)
    {
        return doReaction($actor, Reactions::$GOOD_QUESTION);
    }

    public function labelNiceAdvise($actor)
    {
        return doReaction($actor, Reactions::$NICE_ADVISE);
    }

    public function labelAnswer($actor)
    {
        return doReaction($actor, Reactions::$ANSWER);

    }
  }

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommentReaction Entity.
 *
 * @property int $id
 * @property int $comment_id
 * @property \App\Model\Entity\Comment $comment
 * @property int $actor_id
 * @property \App\Model\Entity\Actor $actor
 * @property int $kind
 * @property int $value
 * @property \Cake\I18n\Time $created_at
 * @property \Cake\I18n\Time $updated_at
 */
class CommentReaction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}

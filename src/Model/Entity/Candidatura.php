<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidatura Entity
 *
 * @property int $id
 * @property int $vaga_id
 * @property string $status
 * @property \Cake\I18n\FrozenTime $data
 */
class Candidatura extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'vaga_id' => true,
        'status' => true,
        'data' => true,
    ];
}

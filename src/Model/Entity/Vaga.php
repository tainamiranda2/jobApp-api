<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vaga Entity
 *
 * @property int $id
 * @property int $cargo_id
 * @property \Cake\I18n\FrozenTime $data_inicial
 * @property int $empresa_id
 * @property string|null $resposta
 * @property string|null $status
 *  @property string|null $nome
* @property string|null $motivo
 * @property \Cake\I18n\FrozenTime $data_final
 */
class Vaga extends Entity
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
        'cargo_id' => true,
        'data_inicial' => true,
        'empresa_id' => true,
        'resposta' => true,
        'nome' => true,
        'status' => true,
        'motivo' => true,
        'data_final' => true,
    ];
}

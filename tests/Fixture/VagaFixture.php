<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VagaFixture
 */
class VagaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'vaga';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'cargo_id' => 1,
                'data_inicial' => '2023-10-21 14:48:48',
                'empresa_id' => 1,
                'resposta' => 'Lorem ipsum dolor ',
                'data_final' => 1697899728,
            ],
        ];
        parent::init();
    }
}

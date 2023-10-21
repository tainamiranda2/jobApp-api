<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CargoFixture
 */
class CargoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cargo';
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'descricao' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

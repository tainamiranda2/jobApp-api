<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CandidaturaFixture
 */
class CandidaturaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'candidatura';
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
                'vaga_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'data' => 1697898914,
            ],
        ];
        parent::init();
    }
}

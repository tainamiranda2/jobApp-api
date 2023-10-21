<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VagaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VagaTable Test Case
 */
class VagaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VagaTable
     */
    protected $Vaga;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Vaga',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Vaga') ? [] : ['className' => VagaTable::class];
        $this->Vaga = $this->getTableLocator()->get('Vaga', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Vaga);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VagaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

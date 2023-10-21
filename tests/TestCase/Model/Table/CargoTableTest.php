<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CargoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CargoTable Test Case
 */
class CargoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CargoTable
     */
    protected $Cargo;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cargo',
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
        $config = $this->getTableLocator()->exists('Cargo') ? [] : ['className' => CargoTable::class];
        $this->Cargo = $this->getTableLocator()->get('Cargo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cargo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CargoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

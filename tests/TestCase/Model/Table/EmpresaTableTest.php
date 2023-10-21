<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresaTable Test Case
 */
class EmpresaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresaTable
     */
    protected $Empresa;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Empresa',
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
        $config = $this->getTableLocator()->exists('Empresa') ? [] : ['className' => EmpresaTable::class];
        $this->Empresa = $this->getTableLocator()->get('Empresa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Empresa);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmpresaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

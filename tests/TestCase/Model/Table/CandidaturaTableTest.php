<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidaturaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidaturaTable Test Case
 */
class CandidaturaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidaturaTable
     */
    protected $Candidatura;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Candidatura',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Candidatura') ? [] : ['className' => CandidaturaTable::class];
        $this->Candidatura = $this->getTableLocator()->get('Candidatura', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Candidatura);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CandidaturaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

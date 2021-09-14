<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesTable;
use App\Test\Fixture\CategoriesFixture;
use Cake\ORM\Association\HasMany;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesTable Test Case
 */
class CategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesTable
     */
    protected $Categories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Categories',
        'app.Articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categories') ? [] : ['className' => CategoriesTable::class];
        $this->Categories = $this->getTableLocator()->get('Categories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Categories);

        parent::tearDown();
    }
    public function testInitialize()
    {
        $this->assertSame('categories',$this->Categories->getTable());
        $this->assertSame('name',$this->Categories->getDisplayField());
        $this->assertSame('id',$this->Categories->getPrimaryKey());
        $this->asserttrue($this->Categories->hasBehavior('Timestamp'));
        $this->assertInstanceOf(HasMany::class,$this->Categories->getAssociation('ChildCategories'));
    }
    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CategoriesTable::validationDefault()
     */

    public function testValidationDefaultNameMaxLength()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        $subject['name'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        //print_r($error);
        $this->assertArrayHasKey('name', $error);
        $this->assertArrayHasKey('maxLength', $error['name']);
    }

    public function testValidationDefaultNameRequirePresence()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        unset($subject['name']);
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
//        print_r($error);
        $this->assertArrayHasKey('name', $error);
        $this->assertArrayHasKey('_required', $error['name']);
    }
    public function testValidationDefaultNameNotEmptyString()
    {
        $subject = $this->Categories->get(categoriesFixture::ID)->toArray();
        $subject['name'] = null;
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertArrayHasKey('name', $error);
        $this->assertArrayHasKey('_empty', $error['name']);
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CategoriesTable::buildRules()
     */
    public function testValidationDefaultDescriptionAllowEmptyString()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        unset($subject['description']);
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(0, $error);
    }
    public function testValidationDefaultDescriptionMaxLength()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        $subject['description'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        //print_r($error);
        $this->assertArrayHasKey('description', $error);
        $this->assertArrayHasKey('maxLength', $error['description']);
    }

    public function testBuildRules(): void
    {
        $this->assertTrue(true);
//        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use App\Test\Fixture\ArticlesFixture;
use Cake\ORM\Association\BelongsTo;
use Cake\TestSuite\TestCase;
use Cake\Utility\Text;

/**
 * App\Model\Table\ArticlesTable Test Case
 * @property ArticlesTable $Articles
 */
class ArticlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTable
     */
    protected $Articles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Articles',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $this->Articles = $this->getTableLocator()->get('Articles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Articles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ArticlesTable::validationDefault()
     */


    public function testInitialize()
    {
        $this->assertSame('articles',$this->Articles->getTable());
        $this->assertSame('title',$this->Articles->getDisplayField());
        $this->assertSame('id',$this->Articles->getPrimaryKey());
        $this->asserttrue($this->Articles->hasBehavior('Timestamp'));
        $this->assertInstanceOf(BelongsTo::class,$this->Articles->getAssociation('Categories'));
        $this->assertInstanceOf(BelongsTo::class,$this->Articles->getAssociation('Users'));
    }

    /**
     * @return void
     */
    public function testValidationDefaultTitleNotEmptyString()
    {
        $subject = $this->Articles->get(ArticlesFixture::ID)->toArray();
        $subject['title'] = null;
        $validator = $this->Articles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
//        print_r($error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('_empty', $error['title']);
    }
    public function testValidationDefaultTitleRequirePresence()
    {
        $subject = $this->Articles->get(ArticlesFixture::ID)->toArray();
        unset($subject['title']);
        $validator = $this->Articles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        //print_r($error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('_required', $error['title']);
    }
    public function testValidationDefaultBodyNotEmptyString()
    {
        $subject = $this->Articles->get(ArticlesFixture::ID)->toArray();
        $subject['body'] = null;
        $validator = $this->Articles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('body', $error);
        $this->assertArrayHasKey('_empty', $error['body']);
    }
    public function testValidationDefaultBodyRequirePresence()
    {
        $subject = $this->Articles->get(ArticlesFixture::ID)->toArray();
        unset($subject['body']);
        $validator = $this->Articles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        // print_r($error);
        $this->assertArrayHasKey('body', $error);
        $this->assertArrayHasKey('_required', $error['body']);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRulesExistsIn()
    {
        $subject = $this->Articles->get(ArticlesFixture::ID);
        $subject['category_id'] = 2;
        $this->assertFalse($this->Articles->save($subject));
        $error = $subject->getErrors();
//      print_r($error);
        $this->assertCount(1, $error);

    }
}

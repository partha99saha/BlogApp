<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use App\Model\Table\ArticlesTable;
use App\Test\Fixture\ArticlesFixture;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ArticlesController Test Case
 *
 * @uses \App\Controller\ArticlesController
 * @property ArticlesTable $Articles
 */

class ArticlesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => ArticlesTable::class];
        $articles = $this->getTableLocator()->get('Users', $config);
        $this->Articles = $articles;
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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::index()
     */

    public function testIndex(): void
    {
        $this->get('/');
        $this->assertResponseSuccess();
    }
    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::view()
     */
    public function testView(): void
    {
        $this->get('/articles/'.ArticlesFixture::ID);
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::add()
     */
    public function testAdd(): void
    {
        $this->post('/articles/add/',[
            'id' => ArticlesFixture::ID,
            'title' => null,
            'body' => null,
            'category_id' => 1,

        ]);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::edit()
     */
    public function testEdit(): void
    {
        $this->post('/articles/edit/',[
            'id' => ArticlesFixture::ID,
            'title' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat.',
            'category_id' => 1,
        ]);
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::delete()
     */
    public function testDelete(): void
    {
        $this->post('/articles/delete/',[
            'id' => ArticlesFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}

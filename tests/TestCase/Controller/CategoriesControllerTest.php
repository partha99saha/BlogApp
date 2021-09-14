<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use App\Model\Table\ArticlesTable;
use App\Model\Table\UsersTable;
use App\Model\Table\CategoriesTable;
use App\Test\Fixture\CategoriesFixture;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CategoriesController Test Case
 *
 * @uses \App\Controller\CategoriesController
 */
class CategoriesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Categories',
        'app.Articles',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => CategoriesTable::class];
        $articles = $this->getTableLocator()->get('Categories', $config);
        //$categories =$this->categories;

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

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::index()
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
     * @uses \App\Controller\CategoriesController::view()
     */
    public function testView(): void
    {
        $this->get('/articles/'.CategoriesFixture::ID);
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::add()
     */
    public function testAdd(): void
    {
        $this->post('/Categories/add/',[
            'id' => CategoriesFixture::ID,
            'name' => null,
            'description' => null,
        ]);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::edit()
     */
    public function testEdit(): void
    {
        $this->post('/categories/edit/',[
            'id' => CategoriesFixture::ID,
            'name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat.',
        ]);
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::delete()
     */
    public function testDelete(): void
    {
        $this->post('/categories/delete/',[
            'id' => CategoriesFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}

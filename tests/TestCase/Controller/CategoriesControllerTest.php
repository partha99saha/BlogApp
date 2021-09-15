<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use App\Model\Table\CategoriesTable;
use App\Model\Table\UsersTable;
use App\Test\Fixture\CategoriesFixture;
use App\Test\Fixture\UsersFixture;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CategoriesController Test Case
 *
 * @uses \App\Controller\CategoriesController
 * @property CategoriesTable $Categories
 * @property UsersTable $Users
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


    protected function _login()
    {
        $identity = $this->Users->get(UsersFixture::ID);
        $this->session([
            'Auth' => $identity,
        ]);
    }

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categories') ? [] : ['className' => CategoriesTable::class];
        $categories = $this->getTableLocator()->get('Categories', $config);
        $this->Categories = $categories;
        $usersConfig = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $users = $this->getTableLocator()->get('Users', $usersConfig);
        $this->Users = $users;
    }
    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Categories);
        unset($this->Users);
        parent::tearDown();
    }
    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::index()
     */


    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::index()
     */
    public function testIndex(): void
    {
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->get('/categories');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::view()
     */
    public function testView(): void
    {
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->get('/categories/view/' . CategoriesFixture::ID);
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\CategoriesController::add()
     */
    public function testAdd(): void
    {
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->post('/categories/add/',[
            'id' => CategoriesFixture::ID,
            'title' => null,
            'body' => null,
            'category_id' => 'c9bfcdc0-bf29-4f04-ac9f-1a64c704930e',

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
        $this->enableCsrfToken();
        $this->post('/categories/edit/',[
            'id' => CategoriesFixture::ID,
            'title' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat.',
            'category_id' => 'c9bfcdc0-bf29-4f04-ac9f-1a64c704930e',
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
        $this->enableCsrfToken();
        $this->post('/categories/delete/',[
            'id' => CategoriesFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}

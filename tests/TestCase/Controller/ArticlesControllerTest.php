<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use App\Model\Table\ArticlesTable;
use App\Model\Table\UsersTable;
use App\Test\Fixture\ArticlesFixture;
use App\Test\Fixture\UsersFixture;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ArticlesController Test Case
 *
 * @uses \App\Controller\ArticlesController
 * @property ArticlesTable $Articles
 * @property UsersTable $Users
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
        'app.Users',
    ];

    /**
     * @return void
     */
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
        $config = $this->getTableLocator()->exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $articles = $this->getTableLocator()->get('Articles', $config);
        $this->Articles = $articles;
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
        unset($this->Articles);
        unset($this->Users);
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
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->get('/articles');
        $this->assertResponseOk();
    }
    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->get('/articles/view/' . ArticlesFixture::ID);
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\ArticlesController::add()
     */
    public function testAdd(): void
    {
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->post('/articles/add/',[
            'id' => ArticlesFixture::ID,
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
     * @uses \App\Controller\ArticlesController::edit()
     */
    public function testEdit(): void
    {
        $this->enableCsrfToken();
        $this->post('/articles/edit/',[
            'id' => ArticlesFixture::ID,
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
     * @uses \App\Controller\ArticlesController::delete()
     */
    public function testDelete(): void
    {
        $this->enableCsrfToken();
        $this->post('/articles/delete/',[
            'id' => ArticlesFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}

<?php

namespace App\Test\TestCase\Controller;

use App\Model\Table\UsersTable;
use App\Test\Fixture\UsersFixture;
use App\Model\Table\ArticlesTable;
use App\Model\Table\CategoriesTable;
use App\Model\Table\RolesTable;
use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;

use Cake\TestSuite\TestCase;
/**
 * @property UsersTable $Users
 */
class UsersControllerTest extends \Cake\TestSuite\TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users',
        'app.Roles',
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
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = $this->getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Users);

        parent::tearDown();
    }
    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\UsersController::index()
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
     * @uses \App\Controller\UsersController::view()
     */
    public function testView(): void
    {
        $this->get('/articles/'.UsersFixture::ID);
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\UsersController::add()
     */
    public function testAdd(): void
    {
        $this->post('/categories/add/',[
            'id' => UsersFixture::ID,
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'password' => null,
            'role_id' =>null,

        ]);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\UsersController::edit()
     */
    public function testEdit(): void
    {
        $this->post('/categories/edit/',[
            'id' => UsersFixture::ID,
            'first_name' => 'ab',
            'last_name' => 'cd',
            'email' => 'abc@gmail.com',
            'password' => '123',
            'role_id' => 'dac07add-3b64-4baf-ba32-5fa8d3d32304',
        ]);
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\UsersController::delete()
     */
    public function testDelete(): void
    {
        $this->post('/categories/edit/',[
            'id' => UsersFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}

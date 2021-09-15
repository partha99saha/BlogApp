<?php
namespace App\Test\TestCase\Controller;
use App\Test\Fixture\UsersFixture;
use App\Model\Table\ArticlesTable;
use App\Model\Table\UsersTable;
use Cake\TestSuite\IntegrationTestTrait;

/**
 * @property UsersTable $Users
 */
class UsersControllerTest extends \Cake\TestSuite\TestCase
{
    use IntegrationTestTrait;

    protected $fixtures = [
        'app.Users',
        'app.Roles',
        'app.Articles',
        'app.Categories'
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
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $users = $this->getTableLocator()->get('Users', $config);
        $this->Users = $users;
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
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->get('/Users');
        $this->assertResponseOk();
    }
    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\UsersController::add()
     */
    public function testAdd(): void
    {
        {
            $this->enableCsrfToken();
            $this->_login();
            $this->enableSecurityToken();
            $this->post('/users/add/',[
                'id' => UsersFixture::ID,
                'first_name' => 'ab',
                'last_name' => 'cd',
                'email' => 'abc@gmail.com',
                'password' => '123',
                'role_id' => 'dac07add-3b64-4baf-ba32-5fa8d3d32304',
            ]);
            $this->assertResponseSuccess();
        }
    }
    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\UsersController::delete()
     */
    public function testDelete(): void
    {
        $this->enableCsrfToken();
        $this->post('/users/delete/',[
            'id' => UsersFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}

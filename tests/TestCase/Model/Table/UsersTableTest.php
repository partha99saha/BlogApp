<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use App\Model\Table\RolesTable;
use Cake\TestSuite\TestCase;
use App\Test\Fixture\UsersFixture;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;


/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users',
        'app.Roles',
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

    public function testInitialize()
    {
        $this->assertSame('users',$this->Users->getTable());
        $this->assertSame('id',$this->Users->getDisplayField());
        $this->assertSame('id',$this->Users->getPrimaryKey());
        $this->asserttrue($this->Users->hasBehavior('Timestamp'));
        $this->assertInstanceOf(BelongsTo::class,$this->Users->getAssociation('Roles'));
        $this->assertInstanceOf(HasMany::class,$this->Users->getAssociation('Articles'));
    }
    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::validationDefault()
     */

    public function testValidationDefaultFirstnameRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['first_name']);
        $subject['email']= null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        //print_r($error);
        $this->assertArrayHasKey('first_name', $error);
        $this->assertArrayHasKey('_required', $error['first_name']);
    }
    public function testValidationDefaultFirstnameNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['first_name']= null;
        $subject['email']= null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        //print_r($error);
        $this->assertArrayHasKey('first_name', $error);
        $this->assertArrayHasKey('_empty', $error['first_name']);
    }
    public function testValidationDefaultLastnameRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['last_name']);
        $subject['email']= null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        //$this->assertIsArray($error);
        //print_r($error);
        $this->assertArrayHasKey('last_name', $error);
        $this->assertArrayHasKey('_required', $error['last_name']);
    }
    public function testValidationDefaultLastnameNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['last_name']= null;
        $subject['email']= null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        //print_r($error);
        $this->assertArrayHasKey('last_name', $error);
        $this->assertArrayHasKey('_empty', $error['last_name']);
    }
    public function testValidationDefaultEmailRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['email']= "abc@gmail.com";
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
       // $this->assertIsArray($error);
        //print_r($error);
        $this->assertArrayHasKey('email', $error);
        $this->assertArrayHasKey('unique', $error['email']);
    }
    public function testValidationDefaultEmailNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['email']= null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        //print_r($error);
        $this->assertArrayHasKey('email', $error);
        $this->assertArrayHasKey('_empty', $error['email']);
    }
    public function testValidationDefaultPasswordMaxLength()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['email']= null;
        $subject['password'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        //print_r($error);
        $this->assertArrayHasKey('password', $error);
        $this->assertArrayHasKey('maxLength', $error['password']);
    }
    public function testValidationDefaultPasswordRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['email'] = null;
        unset($subject['password']);
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
//        print_r($error);
        $this->assertArrayHasKey('password', $error);
        $this->assertArrayHasKey('_required', $error['password']);
    }
    public function testValidationDefaultPasswordNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['email'] = null;
        $subject['password'] = null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        $this->assertArrayHasKey('password', $error);
        $this->assertArrayHasKey('_empty', $error['password']);
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */


    public function testBuildRulesRoleIdExistIn(): void
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $entity = $this->Users->newEntity($subject);
        $entity->role_id = 'dac07add-3b64-4baf-ba32-5fa8d3d32304';
        $entity->password = '123';
        $entity->email = 'abc@gmail.com';
        $this->assertFalse($this->Users->save($entity));
        $error= $entity->getErrors();
        //print_r($error);
        $this->assertArrayHasKey('role_id', $error);
        $this->assertArrayHasKey('_existsIn', $error['role_id']);
    }
    /**
     *  Test to check the email field's isUnique rule
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */
    public function testBuildRulesEmailIsUnique(): void
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['id']);
        $subject['email'] = 'abc@gmail.com';
        $entity = $this->Users->newEntity($subject);
        $this->assertFalse($this->Users->save($entity));
        $error= $entity->getErrors();
        //print_r($error);
        $this->assertCount(1, $error);
        $this->assertArrayHasKey('email', $error);
        $this->assertArrayHasKey('unique', $error['email']);
    }
}

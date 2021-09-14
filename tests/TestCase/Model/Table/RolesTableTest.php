<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesTable;
use Cake\TestSuite\TestCase;
use App\Test\Fixture\RolesFixture;
use Cake\ORM\Association\HasMany;

/**
 * App\Model\Table\RolesTable Test Case
 */
class RolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesTable
     */
    protected $Roles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Roles',
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
        $config = $this->getTableLocator()->exists('Roles') ? [] : ['className' => RolesTable::class];
        $this->Roles = $this->getTableLocator()->get('Roles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Roles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RolesTable::validationDefault()
     */
    public function testInitialize()
    {
        $this->assertSame('roles',$this->Roles->getTable());
        $this->assertSame('title',$this->Roles->getDisplayField());
        $this->assertSame('id',$this->Roles->getPrimaryKey());
        $this->asserttrue($this->Roles->hasBehavior('Timestamp'));
        $this->assertInstanceOf(HasMany::class,$this->Roles->getAssociation('Users'));
    }
    public function testValidationDefaultCodeMaxLength()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        //print_r($error);
        $this->assertArrayHasKey('code', $error);
        $this->assertArrayHasKey('maxLength', $error['code']);
    }

    public function testValidationDefaultCodeRequirePresence()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        unset($subject['code']);
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
//        print_r($error);
        $this->assertArrayHasKey('code', $error);
        $this->assertArrayHasKey('_required', $error['code']);
    }
    public function testValidationDefaultCodeNotEmptyString()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = null;
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertArrayHasKey('code', $error);
        $this->assertArrayHasKey('_empty', $error['code']);
    }

    public function testValidationDefaultTitleMaxLength()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = '2';
        $subject['title'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        //print_r($error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('maxLength', $error['title']);
    }

    public function testValidationDefaultTitleRequirePresence()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = '2';
        unset($subject['title']);
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
//        print_r($error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('_required', $error['title']);
    }
    public function testValidationDefaultTitleNotEmptyString()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = '2';
        $subject['title'] = null;
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('_empty', $error['title']);
    }
    public function testValidationDefaultDescriptionMaxLength()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = '2';
        $subject['description'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        //print_r($error);
        $this->assertArrayHasKey('description', $error);
        $this->assertArrayHasKey('maxLength', $error['description']);
    }
    public function testValidationDefaultDescriptionAllowEmptyString()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = '2';
        unset($subject['description']);
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(0, $error);
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RolesTable::buildRules()
     */

}

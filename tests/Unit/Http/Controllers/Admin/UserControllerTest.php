<?php

namespace Tests\Unit\Http\Controllers\Admin;

use App\Http\Controllers\Admin\UserController;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mockery as m;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Faker\Factory as Faker;

class UserControllerTest extends TestCase
{
    protected $userMock;
    protected $roleMock;
    protected $faker;

    public function setUp(): void
    {
        $this->userMock = m::mock(UserRepositoryInterface::class);
        $this->roleMock = m::mock(RoleRepositoryInterface::class);
        parent::setUp();
    }

    public function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function test_index_function()
    {
        $this->userMock->shouldReceive('getAll')
            ->once()
            ->andReturn(new Collection);
        $users = new UserController($this->userMock, $this->roleMock);
        $result = $users->index();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.users.list', $result->getName());
        $this->assertArrayHasKey('users', $data);
    }

    public function test_store_function()
    {
        $this->faker = Faker::create();
        $data = [
            'name' => $this->faker->name,
            'username' => Str::random(10),
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'password' => Hash::make('password_test'),
            'role_id' => config('role.user'),
        ];
        $this->userMock->shouldReceive('create')
            ->with($data)
            ->once()
            ->andReturn(true);
        $request = new UserRequest($data);
        $user = new UserController($this->userMock, $this->roleMock);
        $result = $user->store($request);
        $this->assertTrue($result);
    }

    public function test_update_function()
    {
        $data = [
            'role_id' => config('role.user'),
        ];
        $this->userMock->shouldReceive('update')
            ->with(config('test.user_id_update'), $data)
            ->once()
            ->andReturn(true);
        $request = new Request($data);
        $user = new UserController($this->userMock, $this->roleMock);
        $result = $user->update($request, config('test.user_id_update'));
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(302, $result->getStatusCode());
        $this->assertArrayHasKey('updated', $result->getSession()->all());
        $this->assertTrue($result->isRedirect());
    }

    public function test_update_function_fail()
    {
        $data = [
            'role_id' => config('role.user'),
        ];
        $this->userMock->shouldReceive('update')
            ->with(config('test.user_id_update'), $data)
            ->once()
            ->andThrow(new ModelNotFoundException);
        $request = new Request($data);
        $user = new UserController($this->userMock, $this->roleMock);
        $result = $user->update($request, config('test.user_id_update'));
        $view = $result->getName();
        $this->assertEquals('admin.layouts.404', $view);;
    }

    public function test_destroy_function()
    {
        $this->userMock->shouldReceive('delete')
            ->with(config('test.user_id_delete'))
            ->once()
            ->andReturn(true);
        $user = new UserController($this->userMock, $this->roleMock);
        $result = $user->destroy(config('test.user_id_delete'));
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(302, $result->getStatusCode());
        $this->assertArrayHasKey('deleted', $result->getSession()->all());
        $this->assertTrue($result->isRedirect());
    }

    public function test_destroy_function_fail()
    {
        $this->userMock->shouldReceive('delete')
            ->with(config('test.user_id_delete'))
            ->once()
            ->andThrow(new ModelNotFoundException);
        $user = new UserController($this->userMock, $this->roleMock);
        $result = $user->destroy(config('test.user_id_delete'));
        $view = $result->getName();
        $this->assertEquals('admin.layouts.404', $view);
    }
}

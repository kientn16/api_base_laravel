<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnglishElementRepositoryTest extends TestCase
{
	use DatabaseTransactions;

	protected $englishElementRepository;

	public function setUp() {
		parent::setUp();
		$this->userRepository = App::make(\App\Repositories\Interfaces\UserRepository::class);
	}

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLargeCondition() {
    	// data
    	factory(App\Models\User::class, 100)->create(['name' => 'user']);

    	$paginate = $this->userRepository->paginateUserByName(['name' => 'user']);

    	$this->assertEquals($paginate->total(), 100);
    }

}

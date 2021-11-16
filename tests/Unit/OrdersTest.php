<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class OrdersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_user_has_many_orders()
    {
        $user = new User;
        $this->assertInstanceOf(Collection::class, $user->orders);
    }
}

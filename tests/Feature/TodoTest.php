<?php

namespace Tests\Feature;
use App\Models\Todo;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
class TodoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_todo_route_return_a_successful_response()
    {
        $response = $this->get('/api/todos');

        $response->assertStatus(200);
    }
    public function test_todo_get_singledata_return_a_successful_response()
    {
        $response = $this->getJson('/api/todo/1');
 
        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('id', 1)
                     ->where('name', 'Victoria Faith')
                     ->etc()
            );
    }
        // untuk mengetest api ada di feature

}

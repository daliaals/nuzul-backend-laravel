<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class PropertyTest extends TestCase
{
    public function test_post(): void
    {
        $response = $this->post('/api/properties', 
        ['title' => '3 bedroom apartment', 'address' =>'10 George Street', 'price' => 4000, 'bedrooms'=> 3, 'bathrooms'=> 3, 'type'=> 'villa', 'status'=> 'sold']);
        $response->assertStatus(201);
    }
    public function test_post_invalid_status(): void
    {
        $response = $this->post('/api/properties', 
        ['title' => '3 bedroom apartment', 'address' =>'6 George Street', 'price' => 4000, 'bedrooms'=> 3, 'bathrooms'=> 3, 'type'=> 'apartment', 'status'=> 'deposit taken']);
        $response->assertStatus(302);
    }
    public function test_post_invalid_type(): void
    {
        $response = $this->post('/api/properties', 
        ['title' => '3 bedroom apartment', 'address' =>'6 George Street', 'price' => 4000, 'bedrooms'=> 3, 'bathrooms'=> 3, 'type'=> 'sharehouse', 'status'=> 'leased']);
        $response->assertStatus(302);
    }
    public function test_update(): void
    {
        $response = $this->put('/api/properties/7/edit', 
        ['title' => '4 bedroom apartment', 'address' =>'10 George Street', 'price' => 7000, 'bedrooms'=> 4, 'bathrooms'=> 3, 'type'=> 'apartment', 'status'=> 'available']);
        $response->assertStatus(200);
    }
    public function test_get_property(): void
    {
        $response = $this->get('/api/properties/10');
        $response->assertStatus(200);
    }
    public function test_get_all_properties(): void
    {
        $response = $this->get('/api/properties');
        $response->assertStatus(200);
    }
    public function test_delete(): void
    {
        $response = $this->delete('/api/properties/22/delete');
        $response->assertStatus(200);

    }
}


<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    protected static ?string $password;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_admin_create_category(): void
    {
        $this->setUpUser();

        $categoryData = [
            "name" => "abc",
            "slug" => "abc",
            "status" => 1
        ];
        $response = $this->post(route('admin.category.create'), $categoryData);

        $this->assertEquals(1, Category::count());
    
        $category = Category::first();
        // Additional assertions if needed
        $this->assertEquals($categoryData['name'], $category->title);
        $this->assertEquals($categoryData['slug'], $category->slug);

    }
}

<?php

namespace Tests\Feature;

use App\Models\Product; // Importando o modelo Product
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase; // Usar RefreshDatabase para limpar o banco entre os testes

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // Teste para obter todos os produtos
    public function test_get_all_products()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    // Teste para obter um produto por ID
    public function test_get_product_by_id()
    {
        $product = Product::factory()->create(); // Cria um produto usando o factory
        $response = $this->get("/api/products/{$product->id}");
        $response->assertStatus(200)
                 ->assertJson($product->toArray());
    }
}

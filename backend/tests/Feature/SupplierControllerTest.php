<?php

namespace Tests\Feature;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should list all suppliers', function () {
    Supplier::factory()->count(2)->create();

    $response = $this->getJson('/api/suppliers');

    $response->assertStatus(200);

    $response->assertJsonCount(2, 'data');
});

it('should create a new supplier', function () {
    $supplierData = [
        'name' => 'New Supplier',
        'phone' => '11987654321',
        'address' => '123 Main St',
        'document_type' => 'CNPJ',
        'document_number' => '24706035000109',
    ];

    $response = $this->postJson('/api/suppliers', $supplierData);

    $response->assertStatus(201);

    $response->assertJsonFragment(['name' => 'New Supplier']);

    $this->assertDatabaseHas('suppliers', $supplierData);
});

it('should show a single supplier', function () {
    $supplier = Supplier::factory()->create();

    $response = $this->getJson('/api/suppliers/' . $supplier->id);

    $response->assertStatus(200);

    $response->assertJsonFragment(['name' => $supplier->name]);
});

it('should update a supplier', function () {
    $supplier = Supplier::factory()->create();

    $updateData = [
        'name' => 'Updated Supplier Name',
        'phone' => '11999998888',
    ];

    $response = $this->patchJson('/api/suppliers/' . $supplier->id, $updateData);

    $response->assertStatus(200);

    $response->assertJsonFragment(['name' => 'Updated Supplier Name']);

    $this->assertDatabaseHas('suppliers', [
        'id' => $supplier->id,
        'name' => 'Updated Supplier Name',
    ]);
});

it('should delete a supplier', function () {
    $supplier = Supplier::factory()->create();

    $response = $this->deleteJson('/api/suppliers/' . $supplier->id);

    $response->assertStatus(200);

    $response->assertJson(['message' => 'Supplier deleted successfully']);

    $this->assertDatabaseMissing('suppliers', ['id' => $supplier->id]);
});

it('should return 404 when trying to find a non-existent supplier', function () {
    $response = $this->getJson('/api/suppliers/999');

    $response->assertStatus(404);
});

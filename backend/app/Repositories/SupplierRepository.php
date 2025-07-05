<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{
    public function __construct(protected Supplier $supplier) {}

    public function getAllSuppliers(int $perPage = 5)
    {
        return $this->supplier->paginate($perPage);
    }

    public function getSupplierById($id)
    {
        return $this->supplier->find($id);
    }

    public function getSupplierByDocument(string $documentType, string $documentNumber)
    {
        return $this->supplier->where('document_type', $documentType)
                              ->where('document_number', $documentNumber)
                              ->first();
    }

    public function createSupplier(array $data)
    {
        return $this->supplier->create($data);
    }

    public function updateSupplier($id, array $data)
    {
        $supplier = $this->getSupplierById($id);
        if ($supplier) {
            $supplier->update($data);
            return $supplier;
        }
        return null;
    }

    public function deleteSupplier($id)
    {
        $supplier = $this->getSupplierById($id);
        if ($supplier) {
            $supplier->delete();
            return true;
        }
        return false;
    }
}

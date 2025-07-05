<?php

namespace App\Services;

use App\Repositories\SupplierRepository;

class SupplierService
{
    public function __construct(protected SupplierRepository $supplierRepository) {}

    public function getAllSuppliers(int $perPage = 5)
    {
        return $this->supplierRepository->getAllSuppliers($perPage);
    }

    public function getSupplierById($id)
    {
        return $this->supplierRepository->getSupplierById($id);
    }

    public function getSupplierByDocument(string $documentType, string $documentNumber)
    {
        return $this->supplierRepository->getSupplierByDocument($documentType, $documentNumber);
    }

    public function createSupplier(array $data)
    {
        return $this->supplierRepository->createSupplier($data);
    }

    public function updateSupplier($id, array $data)
    {
        return $this->supplierRepository->updateSupplier($id, $data);
    }

    public function deleteSupplier($id)
    {
        return $this->supplierRepository->deleteSupplier($id);
    }
}

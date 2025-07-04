<?php

namespace App\Http\Controllers;

use App\Requests\SupplierRequest;
use App\Requests\UpdateSupplierRequest;
use App\Services\SupplierService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function __construct(protected SupplierService $supplierService) {}

    public function index()
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return response()->json($suppliers);
    }

    public function show($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        if ($supplier) {
            return response()->json($supplier);
        }
        return response()->json(['message' => 'Supplier not found'], 404);
    }

    public function showByDocument(Request $request)
    {
        $documentType = $request->input('document_type');
        $documentNumber = $request->input('document_number');

        if (!$documentType || !$documentNumber) {
            return response()->json(['message' => 'Document type and number are required'], 400);
        }

        $supplier = $this->supplierService->getSupplierByDocument($documentType, $documentNumber);
        if ($supplier) {
            return response()->json($supplier);
        }
        return response()->json(['message' => 'Supplier not'], 404);
    }

    public function store(SupplierRequest $request)
    {
        $data = $request->validated();
        $supplier = $this->supplierService->createSupplier($data);
        return response()->json($supplier, 201);
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        $data = $request->validated();
        $supplier = $this->supplierService->updateSupplier($id, $data);
        if ($supplier) {
            return response()->json($supplier);
        }
        return response()->json(['message' => 'Supplier not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->supplierService->deleteSupplier($id);
        if ($deleted) {
            return response()->json(['message' => 'Supplier deleted successfully']);
        }
        return response()->json(['message' => 'Supplier not found'], 404);
    }
}

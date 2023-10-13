<?php

namespace App\Http\Controllers\Platform\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Delete a company
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        CompanyResource::delete($id);

        return response()->json([
            'status'  => true,
            'message' => 'A empresa foi deletada com sucesso.',
        ]);
    }

    /**
     * Update a company instance.
     *
     * @param  UpdateCompanyRequest $request
     * @param  string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        try {
            $company = CompanyResource::update($request->all(), $id);

            if (!$company) {
                return response()->json([
                    'status'  => true,
                    'message' => 'A empresa não foi localizada.',
                ]);
            }

            return response()->json([
                'status'  => true,
                'message' => 'A empresa foi atualizada com sucesso.',
                'company' => $company,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?? 400);
        }
    }

    /**
     * Create a new company instance after a valid registration.
     *
     * @param CreateCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateCompanyRequest $request)
    {
        try {
            $company = CompanyResource::create($request->all());

            return response()->json([
                'status'  => true,
                'message' => 'A empresa foi criada com sucesso.',
                'company' => $company,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?? 400);
        }
    }

    /**
     * Get a company information
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        try {
            $company = CompanyResource::get($id);

            if (!$company) {
                return response()->json([
                    'status'  => true,
                    'message' => 'A empresa não foi localizada.',
                ]);
            }

            return response()->json([
                'status'  => true,
                'company' => $company,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?? 400);
        }
    }

    /**
     * Get all companies
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        try {
            $companies = CompanyResource::getAll();

            return response()->json([
                'status'  => true,
                'companies' => $companies,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?? 400);
        }
    }
}

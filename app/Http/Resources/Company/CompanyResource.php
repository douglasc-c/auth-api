<?php

namespace App\Http\Resources\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Delete a company.
     *
     * @return array
     */
    public static function delete($id)
    {
        $company = Company::find($id);

        $company->delete();

        return true;
    }

    /**
     * Updating company data
     * @param array $data
     * @return \App\Models\Company
     */
    public static function update(array $data, $id)
    {
        $company = Company::find($id);

        if ($company) {
            if (isset($data['name'])) {
                $company->name = $data['name'];
            }

            if (isset($data['tag'])) {
                $company->tag = $data['tag'];
            }

            if (isset($data['social_reason'])) {
                $company->social_reason = $data['social_reason'];
            }

            $company->save();

            return $company;
        }

        throw new \Exception('Empresa não encontrada', 404);
    }

    /**
     * Create a new company.
     *
     * @param  array  $data
     * @return \App\Models\Company
     */
    public static function create(array $data)
    {
        $data['tag'] = strtolower($data['tag']);
        $data['tag'] = str_replace(' ', '', $data['tag']);

        return Company::create([
            'name' => $data['name'],
            'tag' => $data['tag'],
            'social_reason' => $data['social_reason'],
        ]);
    }

    /**
     * Get the company information
     *
     * @param string $id
     * @return \App\Models\Company
     */
    public static function get($id)
    {
        return Company::find($id);
    }

    /**
     * Get all companies
     *
     * @return \App\Models\Company
     */
    public static function getAll()
    {
        return Company::get();
    }
}

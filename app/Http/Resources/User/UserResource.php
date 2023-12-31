<?php

namespace App\Http\Resources\User;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Delete a company.
     *
     * @return array
     */
    public static function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return true;
    }

    /**
     * Updating company data
     * @param array $data
     * @return \App\Models\User
     */
    public static function update(array $data, $id)
    {
        $user = User::find($id);

        if ($user) {
            if (isset($data['name'])) {
                $user->name = $data['name'];
            }

            if (isset($data['type'])) {
                $user->type = $data['type'];
            }

            if (isset($data['document'])) {
                $user->document = $data['document'];
            }

            if (isset($data['social_reason'])) {
                $user->social_reason = $data['social_reason'];
            }

            if (isset($data['company'])) {
                $user->company = $data['company'];
            }

            $user->save();

            return $user;
        }

        throw new \Exception('Cliente não encontrada', 404);
    }

    /**
     * Create a new company.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public static function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'document' => $data['document'],
            'social_reason' => $data['social_reason'],
            'company' => isset($data['company']) ? $data['company'] : null,
        ]);
    }

    /**
     * Get the company information
     *
     * @param string $id
     * @return \App\Models\User
     */
    public static function get($id)
    {
        return User::find($id);
    }

    /**
     * Get all companies
     *
     * @return \App\Models\User
     */
    public static function getAll()
    {
        return User::get();
    }
}

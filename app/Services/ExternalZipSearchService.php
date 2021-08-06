<?php

namespace App\Services;

use App\Models\Address;
use Illuminate\Support\Facades\Http;

class ExternalZipSearchService
{
    const API_URL = 'http://cep.la';

    public function search(string $query)
    {
        $request = Http::acceptJson()->get(implode('/', [
            self::API_URL,
            rawurlencode(rawurldecode($query))
        ]));

        if (!$request->ok())
            return [];

        $response = $request->json();
        if (!$this->isResponseAList($response)) {
            $response = [$response];
        }

        $models = $this->convertToModels($response);
        $this->persistAll($models);

        return $models;
    }

    private function isResponseAList($response)
    {
        return count(array_filter(array_keys($response), 'is_string')) == 0;
    }

    private function convertToModels($response)
    {
        return array_map(function($arr) {
            return new Address([
                'zip_code' => $arr['cep'],
                'address' => $arr['logradouro'] ?? '',
                'city' => $arr['cidade'],
                'state' => $arr['uf'],
                'neighborhood' => $arr['bairro'] ?? '',
            ]);
        }, $response);
    }

    private function persistAll($models)
    {
        foreach ($models as $model) {
            $found = Address::where('zip_code', $model->zip_code)->count() > 0;

            if ($found) {
                continue;
            }

            $model->save();
        }
    }
}

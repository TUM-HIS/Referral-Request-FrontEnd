<?php

namespace App\utils;

use Illuminate\Support\Facades\Http;

class KmhflTokenGenerator
{
    static function tokenGenerator(){

        $response = Http::withBasicAuth('5O1KlpwBb96ANWe27ZQOpbWSF4DZDm4sOytwdzGv', 'PqV0dHbkjXAtJYhY9UOCgRVi5BzLhiDxGU91kbt5EoayQ5SYOoJBYRYAYlJl2RetUeDMpSvhe9DaQr0HKHan0B9ptVyoLvOqpekiOmEqUJ6HZKuIoma0pvqkkKDU9GPv')
            ->asForm()
            ->post('https://api.kmhfltest.health.go.ke/o/token/', [
                'grant_type' => 'password',
                'username' => 'test@testmail.com',
                'password' => 'Test@1234',
                'scope' => 'read',
            ]);

        $token = $response->json()['access_token'];
        return $token;
    }

}

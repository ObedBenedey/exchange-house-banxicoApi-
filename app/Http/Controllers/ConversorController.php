<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ConversorController extends Controller
{
    public function showForm()
    {
        return view('conversor');
    }

    public function convertir(Request $request)
    {
        $monto = $request->input('monto');

        $client = new Client();
        $response = $client->get('https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno', [
            'headers' => [
                'Bmx-Token' => 'b9ae4711544e070bd2695030502cb1bd91ae283da7ec09b132289ddafd4ce473',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $tasaCambio = $data['bmx']['series'][0]['datos'][0]['dato'];

        $resultado = $monto * $tasaCambio;

        return view('conversor', ['montoConvertido' => $resultado]);
    }
}

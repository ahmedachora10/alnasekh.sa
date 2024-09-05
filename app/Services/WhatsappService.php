<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsappService {
    public function sendMessage($to, string $templateName = 'alnasekh_app', array $variables = [], string $languageCode = 'ar')
    {
        $url = "https://graph.facebook.com/v20.0/" . config('services.whatsapp.phone_number_id') . "/messages";
        $to = str_replace(['+', '0'], ['', ''], $to);

        $components = [
            [
                'type' => 'body',
                'parameters' => array_map(function ($variable) {
                    return ['type' => 'text', 'text' => $variable];
                }, $variables),
            ],
        ];

        $response = Http::withToken(config('services.whatsapp.token'))
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => "966$to",
                'type' => 'template',
                'template' => [
                    'name' => $templateName,
                    'language' => [
                        'code' => $languageCode,
                    ],
                    'components' => $components
                ],
            ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            // Handle errors
            throw new \Exception("Failed to send message: " . $response->body());
        }
    }
}
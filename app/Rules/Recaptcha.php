<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('Isian captcha wajib diisi.');
            return;
        }

        // Bypas verifikasi API Google jika di lingkungan local atau testing
        if (app()->environment('local', 'testing')) {
            return;
        }

        $response = \Illuminate\Support\Facades\Http::withoutVerifying()->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        $debugData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'status' => $response->status(),
            'body' => $response->json(),
            'response_token' => $value,
            'secret' => config('services.recaptcha.secret_key'),
        ];
        file_put_contents(base_path('recaptcha_debug.txt'), json_encode($debugData, JSON_PRETTY_PRINT) . "\n", FILE_APPEND);

        if (!$response->successful() || !$response->json('success')) {
            $fail('Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'Arabic', 'slug' => 'ar'],
            ['name' => 'English', 'slug' => 'en'],
            ['name' => 'French', 'slug' => 'fr'],
            ['name' => 'German', 'slug' => 'de'],
            ['name' => 'Spanish', 'slug' => 'es'],
            ['name' => 'Italian', 'slug' => 'it'],
            ['name' => 'Portuguese', 'slug' => 'pt'],
            ['name' => 'Russian', 'slug' => 'ru'],
            ['name' => 'Chinese', 'slug' => 'zh'],
            ['name' => 'Japanese', 'slug' => 'ja'],
            ['name' => 'Korean', 'slug' => 'ko'],
            ['name' => 'Hindi', 'slug' => 'hi'],
            ['name' => 'Urdu', 'slug' => 'ur'],
            ['name' => 'Turkish', 'slug' => 'tr'],
            ['name' => 'Persian', 'slug' => 'fa'],
            ['name' => 'Dutch', 'slug' => 'nl'],
            ['name' => 'Swedish', 'slug' => 'sv'],
            ['name' => 'Norwegian', 'slug' => 'no'],
            ['name' => 'Danish', 'slug' => 'da'],
            ['name' => 'Finnish', 'slug' => 'fi'],
            ['name' => 'Polish', 'slug' => 'pl'],
            ['name' => 'Czech', 'slug' => 'cs'],
            ['name' => 'Slovak', 'slug' => 'sk'],
            ['name' => 'Hungarian', 'slug' => 'hu'],
            ['name' => 'Greek', 'slug' => 'el'],
            ['name' => 'Romanian', 'slug' => 'ro'],
            ['name' => 'Bulgarian', 'slug' => 'bg'],
            ['name' => 'Ukrainian', 'slug' => 'uk'],
            ['name' => 'Hebrew', 'slug' => 'he'],
            ['name' => 'Thai', 'slug' => 'th'],
            ['name' => 'Vietnamese', 'slug' => 'vi'],
            ['name' => 'Indonesian', 'slug' => 'id'],
            ['name' => 'Malay', 'slug' => 'ms'],
            ['name' => 'Filipino', 'slug' => 'tl'],
            ['name' => 'Swahili', 'slug' => 'sw'],
            ['name' => 'Zulu', 'slug' => 'zu'],
            ['name' => 'Afrikaans', 'slug' => 'af'],
            ['name' => 'Tamil', 'slug' => 'ta'],
            ['name' => 'Telugu', 'slug' => 'te'],
            ['name' => 'Bengali', 'slug' => 'bn'],
            ['name' => 'Punjabi', 'slug' => 'pa'],
            ['name' => 'Marathi', 'slug' => 'mr'],
            ['name' => 'Gujarati', 'slug' => 'gu'],
            ['name' => 'Kannada', 'slug' => 'kn'],
            ['name' => 'Malayalam', 'slug' => 'ml'],
            ['name' => 'Sinhala', 'slug' => 'si'],
            ['name' => 'Khmer', 'slug' => 'km'],
            ['name' => 'Lao', 'slug' => 'lo'],
            ['name' => 'Mongolian', 'slug' => 'mn'],
        ];

        Language::insert($languages);
    }
}
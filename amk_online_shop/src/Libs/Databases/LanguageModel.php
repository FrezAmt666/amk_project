<?php 

namespace App\AmkOnlineShop\Databases;

class LanguageModel{
    public static function LanguageOptions(){
        return[
            '1' => 'English',
            '2' => 'French',
            '3' => 'German',
            '4' => 'Spanish',
            '5' => 'Italian',
            '6' => 'Russian',
            '7' => 'Korean',
            '8' => 'Japanese',
            '9' => 'Burmese',
            '10' => 'Chinese',
            '11' => 'Other',
        ];
    }
}
// $languages = LanguageModel::LanguageOptions();
// echo "<pre>";
// print_r($languages);
// echo "</pre>";


?>
<?php namespace ImbaSynergy\Cppcomet\Models;

use Model;
 
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'ImbaSynergy_Cppcomet_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public static function conf($key)
    {
        if(!\Config::get('imbasynergy.cppcomet::useDBsettings'))
        {
            return \Config::get('imbasynergy.cppcomet::'.$key);
        }

        return self::get($key);
    }

}
<?php namespace ImbaSynergy\Cppcomet\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'ImbaSynergy_Cppcomet_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
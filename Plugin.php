<?php namespace ImbaSynergy\Cppcomet;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }
    
    public function registerSettings()
     {
       return [
         'settings' => [
           'label'       => 'CppComet',
           'description' => 'Manage CppComet Settings.',
           'icon'        => 'icon-location-arrow',
           'class'       => 'ImbaSynergy\Cppcomet\Models\Settings',
           'order'       => 100,
           'permissions' => ['ImbaSynergy.Cppcomet.access_settings'],
         ]
       ];
     }
}

<?php namespace ImbaSynergy\Cppcomet\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use ImbaSynergy\Cppcomet\Models\Settings;

class CppComet extends Controller
{ 
    public $implement = [    ];
    protected static $_link = false;
    protected $db_link;
    protected $conf;

    public function __construct()
    { 

        $this->conf = [
            "user" => Settings::conf('user'),
            "password" => Settings::conf('password'),
            "host" => Settings::conf('host'),
            "db" => Settings::conf('db'),
            "port" => Settings::conf('port'),
        ];

        if(!$this->conf['host'])
        {
            \Config::get('imbasynergy.cppcomet::useDBsettings');
            $this->conf = [
                "user" => \Config::get('imbasynergy.cppcomet::user'),
                "password" => \Config::get('imbasynergy.cppcomet::password'),
                "host" => \Config::get('imbasynergy.cppcomet::host'),
                "db" => \Config::get('imbasynergy.cppcomet::db'),
                "port" => \Config::get('imbasynergy.cppcomet::port'),
            ];
        }
        
        $this->db_link = new \PDO('mysql:host='.$this->conf['host'].":".$this->conf['port'].';dbname='.$this->conf['db'], $this->conf['user'], $this->conf['password']);
        
        //$this->db_link = \Db::connection('cppcomet');
        parent::__construct();
    }

    public static function settings()
    {
        return [
            "user" => Settings::conf('user'),
            "password" => Settings::conf('password'),
            "host" => Settings::conf('host'),
            "db" => Settings::conf('db'),
            "port" => Settings::conf('port'),
            "jsApiNode" => Settings::conf('jsApiNode'),
        ];
    }

    public function pdo()
    {
        return $this->db_link;
    }

    public static function api()
    {
        if(self::$_link === false)
        {
            self::$_link = new CppComet();
        }

        return self::$_link;
    }

    public static function getJWT($data, $pass = false, $dev_id = false)
    {
        if($pass === false)
        {
            $pass = Settings::conf('password');
        }

        if($dev_id === false)
        {
            $dev_id = Settings::conf('user');
        }

        // Create token header as a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        if(isset($data['user_id']))
        {
            $data['user_id'] = (int)$data['user_id'];
        }

        // Create token payload as a JSON string
        $payload = json_encode($data);

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $pass.$dev_id, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        return trim($base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature);
    }

}

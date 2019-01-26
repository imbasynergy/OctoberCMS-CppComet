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
        /*
            'driver'    => 'mysql',
            'host'      => 'app.comet-server.ru',
            'port'      => 3306,
            'database'  => 'CometQL_v1',
            'username'  => '15',
            'password'  => 'lPXBFPqNg3f661JcegBY0N0dPXqUBdHXqj2cHf04PZgLHxT6z55e20ozojvMRvB8',
            'prefix'    => '',
            */
        $this->conf = [
            "user" => Settings::get('user', '15'),
            "password" => Settings::get('password', 'lPXBFPqNg3f661JcegBY0N0dPXqUBdHXqj2cHf04PZgLHxT6z55e20ozojvMRvB8'),
            "host" => Settings::get('host', "app.comet-server.ru"),
            "db" => Settings::get('db', "CometQL_v1"),
            "port" => Settings::get('port', 3306),
        ];
 
        $this->db_link = new \PDO('mysql:host='.$this->conf['host'].":".$this->conf['port'].';dbname='.$this->conf['db'], $this->conf['user'], $this->conf['password']);

        //$this->db_link = \Db::connection('cppcomet');
        parent::__construct();
    }

    public function pdo()
    {
        return $this->db_link;//->getPdo();
    }

    public static function api()
    {
        if(self::$_link === false)
        {
            self::$_link = new CppComet();
        }

        return self::$_link;
    }
}

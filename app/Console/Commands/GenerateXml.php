<?php

namespace App\Console\Commands;

use SimpleXMLElement;
use App\Models\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\UserDetail;
use App\User;
use Illuminate\Console\Command;

class GenerateXml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate xml with user info';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserArray($id) {
        $user = User::where('id', '=', $id)->get()->toArray();
        $user_info = UserDetail::where('user_id', '=', $id)->orderBy('last_login', 'desc')->get()->toArray();
        $user_hash = Hash::where('user_id', '=', $id)->with('vocabulary')->orderBy('created_at', 'desc')->get()->toArray();

        $userData = ['user' => $user, 'user_info' => $user_info, 'user_hash' => $user_hash];
        return $userData;
    }

    public function arrayToXml(array $arr, SimpleXMLElement $xml) {
        foreach ($arr as $k => $v) {
            is_array($v)
                ? $this->arrayToXml($v, $xml->addChild($k))
                : $xml->addChild($k, $v);
        }
        return $xml;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structure = public_path('xml');

        if (!is_writable($structure)) {
            if (file_exists($structure)) {
                chmod($structure, 0777);
            } else {
                mkdir($structure, 0777, false);
            }

        }
        // I did not have time to finish
        $xml = $this->arrayToXml($this->getUserArray(1), new SimpleXMLElement('<root/>'))->asXML();

        file_put_contents($structure . '/test.xml', $xml);
    }
}

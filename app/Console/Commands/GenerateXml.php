<?php

namespace App\Console\Commands;

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

    public function getUserArray() {
        $user = User::with('hash', 'userDetail')->get()->toArray();
        return $user;
    }

    public function arrayToXml() {

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
        dd($this->getUserArray());
    }
}

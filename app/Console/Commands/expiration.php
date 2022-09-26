<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire user evrey 5 minutes atomatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $user =  User::where('expire' , 0)->get();
        foreach($user as $user){
            $user ->update(['expire' => 1]);
        }
        
    }
}

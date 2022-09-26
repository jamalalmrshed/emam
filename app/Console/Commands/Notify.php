<?php

namespace App\Console\Commands;

use App\Mail\NotifyMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all user every day ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::select('email')->get();
        $emails = User::pluck('email')->toArray();
        $data = ['title'=> 'programming' , 'body' => 'php'];
        foreach($emails as $emails){
            //how to send emails byuse laravel


            Mail::To($emails) ->send(new NotifyMail($data));
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendEmail extends Command
{
    protected $commands = [
        Commands\sendEmail::class,
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Send emails to all student who's registration is done.";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = User::select('email')->get();
        $students = [];
        foreach($data as $std) {
            $students[] = $std['email'];
        }

        Mail::send('email', [], function($message) use ($students) {
            $message->to($students)->subject('Registration Successfull');
        });
    }
}

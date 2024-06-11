<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:delete-inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the inactive users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $name = $this->argument('name');
        // $name = $this->ask('what is yur name?');

        User::where('name', 'vishnu')->get();

        // $password = $this->secret('what is your password?');

        // if ($this->confirm('Are you sure want to delete the user?')) {
        //     dd("Yes proceed");
        // }

        // $name = $this->anticipate('what is your name ?', ['Vishnu', 'akhil']);
        // $this->info('This is an error messaage');
        // $this->error('This is an error messaage');
        // dd($name);
    }
}

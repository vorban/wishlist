<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all()->map(fn (User $u) => $u->name)->toArray();
        $result = $this->choice('User', $users);

        $user = User::query()->where('name', $result)->first();

        $name = $this->ask('Name', $user->name);
        $email = $this->ask('Email', $user->email);
        $password = $this->secret('Password');

        $user->fill([
            'name' => $name,
            'email' => $email,
            'password' => strlen($password) ? bcrypt($password) : $user->password,
        ])->save();

        return Command::SUCCESS;
    }
}

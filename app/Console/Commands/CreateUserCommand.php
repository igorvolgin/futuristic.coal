<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    protected $signature = 'auth:user-create {name} {email} {password}';
    protected $description = 'Will create user and generate api token';

    public function handle(): bool
    {
        $validateUser = Validator::make($this->argument(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);

        if ( ! $validateUser->fails()) {
            $user = User::create([
                'name' => $this->argument('name'),
                'email' => $this->argument('email'),
                'password' => Hash::make($this->argument('password')),
            ]);


            $this->info('User Created');
            $this->info('User token: '.$user->createToken('Demo token')->plainTextToken);

            return true;
        }
        $this->error('Validation failed');

        return false;
    }
}

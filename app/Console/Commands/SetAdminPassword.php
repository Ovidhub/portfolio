<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetAdminPassword extends Command
{
    protected $signature = 'app:set-admin-password {password? : New password (defaults to the ADMIN_PASSWORD env var)} {--email= : Admin email (defaults to ADMIN_EMAIL env var or admin@example.com)}';

    protected $description = 'Set or reset the admin account password.';

    public function handle(): int
    {
        $password = $this->argument('password') ?: env('ADMIN_PASSWORD');

        if (! $password) {
            $this->error('Provide a password argument or set the ADMIN_PASSWORD env var.');

            return self::FAILURE;
        }

        $email = $this->option('email') ?: env('ADMIN_EMAIL', 'admin@example.com');

        $user = User::firstOrNew(['email' => $email]);
        $user->name = $user->name ?: 'Site Admin';
        $user->password = Hash::make($password);
        $user->save();

        $this->info("Admin password updated for {$email}.");

        return self::SUCCESS;
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class SeedIfEmpty extends Command
{
    protected $signature = 'app:seed-if-empty';

    protected $description = 'Seed the database only when it is empty, so seeding is safe to run on every deploy without overwriting existing data.';

    public function handle(): int
    {
        if (Schema::hasTable('users') && User::query()->exists()) {
            $this->info('Database already has data — skipping seed.');

            return self::SUCCESS;
        }

        $this->info('Empty database detected — seeding initial data.');
        $this->call('db:seed', ['--force' => true]);

        return self::SUCCESS;
    }
}

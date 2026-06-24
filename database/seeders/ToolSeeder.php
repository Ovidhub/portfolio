<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            ['name' => 'React', 'icon' => 'atom', 'color' => '#61DAFB'],
            ['name' => 'Node.js', 'icon' => 'server', 'color' => '#339933'],
            ['name' => 'TypeScript', 'icon' => 'file-code', 'color' => '#3178C6'],
            ['name' => 'Next.js', 'icon' => 'layers', 'color' => '#000000'],
            ['name' => 'Tailwind', 'icon' => 'paintbrush', 'color' => '#06B6D4'],
            ['name' => 'PostgreSQL', 'icon' => 'database', 'color' => '#4169E1'],
            ['name' => 'MongoDB', 'icon' => 'leaf', 'color' => '#47A248'],
            ['name' => 'AWS', 'icon' => 'cloud', 'color' => '#FF9900'],
            ['name' => 'Docker', 'icon' => 'box', 'color' => '#2496ED'],
            ['name' => 'Git', 'icon' => 'git-branch', 'color' => '#F05032'],
            ['name' => 'Figma', 'icon' => 'pen-tool', 'color' => '#F24E1E'],
            ['name' => 'VS Code', 'icon' => 'terminal', 'color' => '#007ACC'],
        ];

        foreach ($tools as $i => $tool) {
            Tool::updateOrCreate(
                ['name' => $tool['name']],
                array_merge($tool, ['sort_order' => $i]),
            );
        }
    }
}

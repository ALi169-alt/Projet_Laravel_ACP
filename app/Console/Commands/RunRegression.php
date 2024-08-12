<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunRegression extends Command
{
    protected $signature = 'regression:run';

    protected $description = 'Execute the Python regression script';

    public function handle()
    {
        $pythonScriptPath = base_path('app/Scripts/regression.py');
        $output = shell_exec("python {$pythonScriptPath}");
        $this->info($output);
    }
}

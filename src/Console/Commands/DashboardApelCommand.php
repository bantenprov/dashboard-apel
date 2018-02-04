<?php namespace Bantenprov\DashboardApel\Console\Commands;

use Illuminate\Console\Command;

/**
 * The DashboardApelCommand class.
 *
 * @package Bantenprov\DashboardApel
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DashboardApelCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:dashboard-apel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\DashboardApel package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\DashboardApel package');
    }
}

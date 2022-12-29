<?php

namespace App\Console\Commands;

use App\Http\Helpers\PushNotificationHelper;
use Illuminate\Console\Command;

class RetryPushNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:retry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retries to send Push Notification after lawyer is assigned';

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
     * @return int
     */
    public function handle()
    {
        PushNotificationHelper::retryToSendNotification();
    }
}

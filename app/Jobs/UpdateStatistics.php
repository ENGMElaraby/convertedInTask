<?php

namespace App\Jobs;

use App\Services\StatisticsService;
use Illuminate\{Bus\Queueable,
    Contracts\Queue\ShouldQueue,
    Foundation\Bus\Dispatchable,
    Queue\InteractsWithQueue,
    Queue\SerializesModels};

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly StatisticsService $statisticsService)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->statisticsService->update();
    }
}

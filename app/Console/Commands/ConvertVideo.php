<?php

namespace App\Console\Commands;

use FFMpeg\Format\Video\X264;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;

class ConvertVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:video';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $files = Storage::disk('public')->files();
        foreach($files as $file)
        {
            exec("ffmpeg -i /home/vpssim.demo/public_html/storage/app/public/$file /home/vpssim.demo/public_html/storage/app/public/$file.mp4");
			exec("rm -rf /home/vpssim.demo/public_html/storage/app/public/$file");
        }
        return 0;
    }
}

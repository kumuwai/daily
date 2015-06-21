<?php namespace Kumuwai\Playground\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class GenerateHistoryVideo extends Command 
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'playground:make:video';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a development history video';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Filesystem $fs)
    {
        $latest = exec('git show-ref refs/heads/master --hash=8');
        $version = config('playground.history.version');

        if ($fs->exists($version) && $fs->get($version) == $latest)
            return;

        $fs->put($version, $latest);
        $file = config('playground.history.file');

        exec("bin/gource $file.new.mp4");
        $fs->move("$file.new.mp4", $file);

        $this->comment('finished generating '.$file);
    }

}

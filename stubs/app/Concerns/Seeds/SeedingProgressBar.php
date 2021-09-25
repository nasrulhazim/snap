<?php

namespace App\Concerns\Seeds;

trait SeedingProgressBar
{
    public function run()
    {
        $seeders = $this->seeders;

        $this->command->info('Seeding '.__CLASS__.'...');
        $this->command->getOutput()->progressStart(count($seeders));

        foreach ($seeders as $class) {
            if (class_exists($class)) {
                $this->call($class);
            } elseif (method_exists($this, $class)) {
                $method = $class;
                $this->$method();
            }

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}

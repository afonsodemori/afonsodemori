<?php

namespace App\Helper;

abstract class CliHelper
{
    public static function calculatePeriod(
        string $startDate,
        ?string $endDate,
        // TODO: Think of a better way for $trans
        \stdClass $trans
    ): string {
        $isCurrentJob = false;

        if (is_null($endDate)) {
            $isCurrentJob = true;
            $endDate = (new \DateTime())
                ->setTime(0, 0)
                ->format('Y-m-d');
        }

        [$startYear, $startMonth] = explode('-', $startDate);
        [$endYear, $endMonth] = explode('-', $endDate);

        $startDT = new \DateTime("$startYear-$startMonth");
        $endDT = (new \DateTime("$endYear-$endMonth"))->add(new \DateInterval("P1M"));
        $interval = ($startDT)->diff($endDT);

        $period = '';

        if ($interval->y > 0) {
            $key = ($interval->y === 1) ? 'year' : 'years';
            $period .= "$interval->y {$trans->experience->$key} ";
        }

        if (
            $interval->y > 0
            && $interval->m > 0
            && $trans->experience->conjunction !== ''
        ) {
            $period .= " {$trans->experience->conjunction} ";
        }

        if ($interval->m > 0) {
            $key = ($interval->m === 1) ? 'month' : 'months';
            $period .= "$interval->m {$trans->experience->$key} ";
        }

        // remove final space in case of 0 months
        $period = trim($period);

        $startMonthName = $trans->footer->months[((int)$startMonth) - 1];
        $endMonthName = $trans->footer->months[((int)$endMonth) - 1];

        $final = "$startMonthName $startYear – ";
        if ($isCurrentJob) {
            $final .= $trans->experience->present;
        } else {
            $final .= "$endMonthName $endYear";
        }

        return "$final ($period)";
    }

    public static function writeFile(string $path, string $content): void
    {
        $dir = dirname($path);

        if (!is_dir($dir)) {
            self::log("Creating directory `$dir`...");
            if (!mkdir($dir, 0755, true) && !is_dir($dir)) {
                throw new \RuntimeException(sprintf('Can not create "%s". Check your permissions.', $dir));
            }
        }

        // TODO: Control overwriting
        self::log("Writing $path... ", false);
        file_put_contents($path, $content);
        $fileSize = number_format(filesize($path) / 1024, 2);
        self::log("$fileSize KB", true, false);
    }

    public static function ln(): void
    {
        echo PHP_EOL;
    }

    public static function log(
        string $message,
        $linebreak = true,
        $timestamp = true
    ): void {
        if ($timestamp) {
            echo sprintf("[%s] ", date('H:i:s'));
        }

        echo $message;

        if ($linebreak) {
            self::ln();
        }
    }
}

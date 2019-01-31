<?php

use Symfony\Component\Process\Process;

$process = new Process('git describe --tags');
$process->run();

$currentTag = 'unknown-version';

if ($process->isSuccessful()) {
    $currentTag = trim($process->getOutput());
}

return [
    'currentTag' => $currentTag,
];

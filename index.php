<?php
require "vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log', Level::Debug));

// Add records to the log
$log->warning('[YOUR COMPLETE NAME]');
$log->error('[YOUR EMAIL ADDRESS]');
$log->info('profile', [
    'student_number' => '[YOUR STUDENT NUMBER]',
    'college' => '[COLLEGE NAME]',
    'program' => '[PROGRAM NAME]',
    'university' => '[UNIVERSITY NAME]'
]);

class TestClass
{
    private $logger;

    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        // Log that the class has been created
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        // Provide a greeting message with the name of the invoker
        $this->logger->info(__METHOD__ . " Greetings to {$name}");
    }

    public function getAverage($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " get the average");
        // Compute the average and return it
        if (!is_array($data) || empty($data)) {
            $this->logger->warning('Data should be a non-empty array');
            return null;
        }
        return array_sum($data) / count($data);
    }

    public function largest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Get the largest number");
        // Compute the largest number and return it
        if (!is_array($data) || empty($data)) {
            $this->logger->warning('Data should be a non-empty array');
            return null;
        }
        return max($data);
    }

    public function smallest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Get the smallest number");
        // Compute the smallest number and return it
        if (!is_array($data) || empty($data)) {
            $this->logger->warning('Data should be a non-empty array');
            return null;
        }
        return min($data);
    }
}

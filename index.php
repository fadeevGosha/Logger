<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Enums\LoggerLevelCode;
use App\Exceptions\LoggerUnavailableException;
use App\Factories\LoggerHandlerFactory;
use App\Handler\FileHandlerInterface;
use App\Logger\Logger;

$handlerFactory = new LoggerHandlerFactory();
$logger = new Logger();


try {

    //with error
    $handler = $handlerFactory->createHandler(LoggerLevelCode::ERROR);

    $logger->setLoggerHandler($handler);

    $logger->log(LoggerLevelCode::ERROR, 'Error message');
    $logger->error('Error message');

    //with info
    $handler = $handlerFactory->createHandler(LoggerLevelCode::INFO);
    $logger->setLoggerHandler($handler);

    $logger->log(LoggerLevelCode::INFO, 'Info message');
    $logger->info('Info message');


    //with debug
    $handler = $handlerFactory->createHandler(LoggerLevelCode::DEBUG);
    $logger->setLoggerHandler($handler);

    $logger->log(LoggerLevelCode::DEBUG, 'Debug message');
    $logger->info('Debug message');


    //with notice
    $handler = $handlerFactory->createHandler(LoggerLevelCode::NOTICE);
    $logger->setLoggerHandler($handler);

    $logger->log(LoggerLevelCode::NOTICE, 'Notice message');
    $logger->info('Notice message');


    //test handlers
    /**
     * @var FileHandlerInterface $fileHandler
     */
    $fileHandler = $handlerFactory->createHandler(LoggerLevelCode::INFO);

    $fileHandler->log(LoggerLevelCode::INFO, 'Info message from FileHandler');
    $fileHandler->info('Info message from FileHandler');

    //check disable
    $fileHandler->setIsEnabled(false);

    $fileHandler->log(LoggerLevelCode::INFO, 'Info message from FileHandler');
    $fileHandler->info('Info message from FileHandler');
} catch (LoggerUnavailableException $e) {
    var_dump($e->getMessage());
    die();
}



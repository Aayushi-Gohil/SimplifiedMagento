<?php

namespace SimplifiedMagento\CronExample\Cron;

use \Psr\Log\LoggerInterface;

class Demo {

  protected $logger;

  public function __construct(LoggerInterface $logger) {

    $this->logger = $logger;

  }

  /**

    * Write to system.log

    *

    * @return void

  */

  public function execute() {

    // Do your Stuff

    $this->logger->info('Cron Works');

  }

}
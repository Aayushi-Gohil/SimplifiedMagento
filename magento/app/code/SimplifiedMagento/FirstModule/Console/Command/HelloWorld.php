<?php
namespace SimplifiedMagento\FirstModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorld extends Command
{

	public function configure()
	{
		$this->setName('training:hello_world')
			->setDescription('The command prints out the hello world')
			->setAliases(array('hw'));
	}

	public function execute(InputInterface $input, OutputInterface $out)
	{
		$this->writeIn('Hello World');
	}
}
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Console\KeyGenerateCommand;

class RootKeyGenerate extends KeyGenerateCommand
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'rootkey:generate';

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
   * @return mixed
   */
  public function handle()
  {
    $key = $this->generateRandomKey();

    // Next, we will replace the application key in the environment file so it is
    // automatically setup for this developer. This key gets generated using a
    // secure random byte generator and is later base64 encoded for storage.
    if (! $this->setKeyInEnvironmentFile($key)) {
      return;
    }

    $this->laravel['config']['app.apikey'] = $key;

    $this->info("Application key [$key] set successfully.");
  }

  function setKeyInEnvironmentFile($key)
  {
    $currentKey = $this->laravel['config']['app.apikey'];

    if (strlen($currentKey) !== 0 && (! $this->confirmToProceed())) {
      return false;
    }

    $this->writeNewEnvironmentFileWith($key);

    return true;
  }

  function writeNewEnvironmentFileWith($key)
  {
    file_put_contents($this->laravel->environmentFilePath(), preg_replace(
      $this->keyReplacementPattern(), 'ROOT_API_KEY='.$key, file_get_contents($this->laravel->environmentFilePath())
    ));
  }
  protected function keyReplacementPattern()
  {
    $escaped = preg_quote('='.$this->laravel['config']['app.apikey'], '/');

    return "/^ROOT_API_KEY{$escaped}/m";
  }

  protected function generateRandomKey()
  {
    return 'rootApiKeyEncript:' . base64_encode(
        Encrypter::generateKey($this->laravel['config']['app.cipher'])
      );
  }

}

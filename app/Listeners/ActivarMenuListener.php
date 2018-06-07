<?php

namespace App\Listeners;

use App\Events\ActivarMenuEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivarMenuListener
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct(){
    //
  }

  /**
   * Handle the event.
   *
   * @param  ActivarMenuEvent  $event
   * @return void
   */
  public function handle(ActivarMenuEvent $event){
    //
  }
}

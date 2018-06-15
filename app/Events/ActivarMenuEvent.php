<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use App\Models\Menu;

class ActivarMenuEvent implements ShouldBroadcastNow
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $menu;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Menu $menu){
    $this->menu = $menu;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn(){
    return new Channel('menuChannel');
  }

  /**
   * Get the data to broadcast.
   *
   * @return array
   */
  public function broadcastWith(){
      return $this->menu->platos->all();
  }
}

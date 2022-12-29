<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class InviteeQr extends Model
{
    use HasFactory;

	protected $guarded = ['id'];

	public function event()
    {
      return $this->belongsTo(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $guarded = ['id'];

	public function getCreatedAt() {
		return $this->created_at->format('d-m-Y');
	}

    use HasFactory;
}

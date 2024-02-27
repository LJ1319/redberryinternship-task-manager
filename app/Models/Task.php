<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	protected $with = ['user'];

	protected $casts = [
		'due_date' => 'datetime',
	];

	public function scopeFilter($query, array $filters): void
	{
		$query->when(
			isset($filters['overdue']) && $filters['overdue'] === 'true',
			fn ($query) => $query
				->where('due_date', '<', now())
		);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

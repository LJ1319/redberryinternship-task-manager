<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Task extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $guarded = ['id'];

	protected $with = ['user'];

	protected $casts = [
		'due_date' => 'datetime',
	];

	public array $translatable = ['name', 'description'];

	public function scopeFilter($query, array $filters): void
	{
		$query->when(
			isset($filters['overdue']) && $filters['overdue'] === 'true',
			fn ($query) => $query
				->where('due_date', '<', now())
		);

		$query->when(
			isset($filters['create-order']) && $filters['create-order'] === 'asc',
			fn ($query) => $query
				->reorder('created_at', 'asc')->get()
		);

		$query->when(
			isset($filters['create-order']) && $filters['create-order'] === 'desc',
			fn ($query) => $query
				->reorder('created_at', 'desc')->get()
		);

		$query->when(
			isset($filters['due-order']) && $filters['due-order'] === 'asc',
			fn ($query) => $query
				->reorder('due_date', 'asc')->get()
		);

		$query->when(
			isset($filters['due-order']) && $filters['due-order'] === 'desc',
			fn ($query) => $query
				->reorder('due_date', 'desc')->get()
		);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

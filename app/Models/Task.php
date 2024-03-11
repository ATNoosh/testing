<?php

namespace App\Models;

use App\Constants\TaskStatuses;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUncompleted(Builder $query):void
    {
        $query->where('status','<>',TaskStatuses::COMPLETED);
    }

    public function scopeCreatedDaysBefore(Builder $query, int $days)
    {
        $query->where('created_at', '<=', Carbon::now()->subDays($days));
    }
}

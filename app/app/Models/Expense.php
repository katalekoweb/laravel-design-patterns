<?php

namespace App\Models;

use App\Observers\ExpenseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(ExpenseObserver::class)]
class Expense extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'amount',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($expense) {
            $expense->uuid = (string) \Illuminate\Support\Str::uuid();
            $expense->user_id = request()->user()?->id;
        });
    }
}

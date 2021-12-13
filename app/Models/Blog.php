<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'slug', 'desc', 'user_id', 'created_at' ];
    protected $appends = [ 'publication_date' ];

    public function getPublicationDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function scopeSubHour($q)
    {
        return $q->where('created_at', '>=', Carbon::now()->subHours(1));
    }

}

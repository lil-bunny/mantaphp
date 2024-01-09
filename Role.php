<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;

class Role extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;
    protected $guarded = [];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'role_id',
        'admin_access',
        'status',
    ];

    public $sortable = [
        'id',
        'title',
        'created_at'
    ];

    public function menus() {
        return $this->belongsToMany(Menu::class, 'role_menu');
    }
}
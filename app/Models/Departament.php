<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Departament extends Model
{

    use HasApiTokens, HasFactory, Notifiable , HasRecursiveRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'Departament';
    protected $fillable = [
       'parent_id', 'name',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function subDepartament()
    {
        return $this->hasMany('App\Models\Departament', 'parent_id','id');
    }
}
<?php 
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{	
    protected $table = 'event';
    protected $fillable = ['name', 'description', 'date'];
    public $timestamps = false;
}
<?php

namespace App\Models;

use App\Models\User;
use App\Models\ApartmentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    //protected $fillable = [ 'title','company','location','website','email','tags','description'];
    public function scopeFilter($query, array $filters){
        if ($filters['extras'] ?? false){
            $query->where('extras','like','%'.request('extras').'%');
            //or $query->where('tags','like','%'.$filters['tag'].'%');
        }
        if ($filters['search'] ?? false){
            $query->where('aprtmnt_name','like','%'.request('search').'%')
            ->orWhere('description','like','%'.request('search').'%')
            ->orWhere('extras','like','%'.request('search').'%')
            ->orWhere('closest_town','like','%'.request('search').'%');
        }

    }
    //relationship to user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function county(){
        return $this->belongsTo(County::class,'county_id');
    }
    public function apartmentType(){
        return $this->belongsTo(ApartmentType::class,'house_aprt_type');
    }
}

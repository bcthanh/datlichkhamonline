<?php

namespace App;

use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;


use Closure; 

class Scheduletiming extends Model
{
   // use FilterPaginateOrder;

    protected $fillable = [
        // 'name',
    ];

    // protected $filter = [
    //     'id', 'name', 'created_at', 'updated_at',
    //     // relacoes
    //     'user.id', 'user.name', 'user.email', 'user.seg_social'

    // ];

    public function user() {
        return $this->belongsTo('App\User');  //, 'proficiency_user', 'user_id', 'proficiency_id');
    }

   
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;



class Document extends Model
{

	protected $primaryKey = 'uuid';

    protected $guarded = [];


    protected $fillable = ['status', 'payload'];

    public $incrementing = false;

    

    public static function boot()
    {
         parent::boot();
         self::creating(function($model){
             $model->id = self::generateUuid();
         });

    }  



    public static function generateUuid()
    {
         return Uuid::generate();
    }


}

<?php

namespace App\Models;


use App\Traits\HasFilterBy;
use App\Traits\HasSortBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, HasFilterBy, HasSortBy;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'color',
        'year',
        'top_speed',
        'has_gas_economy',
        'car_model_id'
    ];

    /**
     * @var array
     */
    protected $sortable = [
        'id',
        'created_at',
        'year',
        'top_speed'
    ];


    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Vehicle extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {   

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search. '%');
        });

        $query->when($filters['brand'] ?? false, function($query, $brand) {
            return $query->whereHas('brand', function($query) use ($brand) {
                $query->where('slug', $brand);
            });
        });

        $query->when($filters['type'] ?? false, function($query, $type) {
            return $query->whereHas('type', function($query) use ($type) {
                $query->where('slug', $type);
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(($filters['start_date'] ?? false) || ($filters['end_date'] ?? false) , function($query) use ($filters) {
            $form_start_date =  $filters['start_date'];
            $form_end_date = $filters['end_date'];
            return $query->whereNotIn('id', function($query) use ($form_start_date, $form_end_date) {
                $query->from('rents')
                ->select('vehicle_id')
                ->where('start_date', '<', $form_end_date)
                ->where('end_date', '>', $form_start_date)
                ->where('status_id', '=', 2);
            });
        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'plate_num']
            ]
        ];
    }

}

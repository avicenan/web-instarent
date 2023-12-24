<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vehicle_id', 'nama_lengkap', 'pekerjaan', 'alamat', 'universitas', 'telp_num', 'nim', 'sec_contact', 'jurusan', 'id_line', 'angkatan', 'username_instagram', 'kelas', 'start_date', 'end_date', 'rute_tujuan', 'rute_tujuan_ket', 'ktp', 'sim', 'ktm', 'tnc', 'status_id', 'total_price'];

    // protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? false, function($query, $status) {
            return $query->whereHas('status', function($query) use ($status) {
                $query->where('slug', $status);
            });
        });

    }
    
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function search($term, $kriteria = null, $tipe = null, $paginate = 6)
    {
        $query = $this->where(function($query) use ($term) {
                    $query  ->where('nama', 'like', '%'.$term.'%')
                            ->orWhere('sub_kriteria', 'like', '%'.$term.'%')
                            ->orWhere('catatan', 'like', '%'.$term.'%');
                });
    
        if ($kriteria) {
            $query->where('kriteria', $kriteria);
        }
    
        if ($tipe) {
            $query->where('tipe', $tipe);
        }
    
        $query->orderBy('created_at', 'desc');
    
        $results['count'] = $query->count();
        $results['data'] = $query->paginate($paginate)->withQueryString();

        return $results;
    }
    
    
    
}

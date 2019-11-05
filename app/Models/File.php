<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'file_id';
    protected $guarded = ['file_id'];

    //protected $fillable='';

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'file_package', 'package_id', 'file_id');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function getFileTypeTextAttribute()
    {
        $types = [
            'application/pdf' => 'PDF',
            'image/png' => 'PNG',
            'text/plain' => 'TXT'
        ];
        return $types[$this->attributes['file_type']];
    }

}

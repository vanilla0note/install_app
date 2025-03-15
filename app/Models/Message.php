<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'date2',
        'dep_area','careus_name','careus_id','careus_tel','careus_mail',
        'problem','state','remark','reply','staff','note','deadline'
        ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}

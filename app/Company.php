<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'logo', 'website'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    /**
     * @return mixed
     */
    public function getLogoUrl()
    {
        return Storage::url($this->logo);
    }
}

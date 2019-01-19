<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

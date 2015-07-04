<?php namespace Kumuwai\Playground\Modules\Project001;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $fillable = ['first_name','last_name','email'];

    public function getNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

}

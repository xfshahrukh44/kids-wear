<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'heading', 'detail', 'icon', 'image', 'parent', 'is_featured'];

    public function _parent ()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children ()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    
}

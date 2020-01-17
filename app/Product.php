<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'prize',  'description',  'images',  'toactive', 'fromactive'];

    protected $casts = [
        'images' => 'array'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->status = true;
        });
    }

    public function toggle()
    {
        $this->status = !$this->status;
        $this->save();
    }

    public function isApproved()
    {
        return $this->status;
    }

    public function getApproveStatus()
    {
        return $this->isApproved() ? 'Active' : 'Deactive';
    }

}

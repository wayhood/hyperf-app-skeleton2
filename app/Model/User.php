<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $username 
 * @property string $nickname 
 * @property string $password 
 * @property string $avatar 
 * @property string $is_lock 
 * @property string $created_at 
 * @property string $updated_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['id', 'username', 'nickname', 'password', 'avatar', 'is_lock', 'created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer'];
}
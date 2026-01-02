<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use \Illuminate\Database\Eloquent\Factories\HasFactory<\Database\Factories\SkillFactory> */
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'industry',
    ];

    public function employments()
    {
        return $this->belongsToMany(Employment::class, 'employment_skill');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skill');
    }
}

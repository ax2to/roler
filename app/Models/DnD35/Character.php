<?php

namespace App\Models\DnD35;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    const ABILITY_STR = 'str';
    const ABILITY_WIS = 'wis';

    protected $table = 'dnd35_characters';

    public function __construct($name, $campaign, $user, array $attributes = [])
    {
        parent::__construct($attributes);

        $this->name = $name;
        $this->campaign_id = $campaign;
        $this->user_id = $user;
        $this->level = 0;
        $this->str = 10;
        $this->dex = 10;
        $this->con = 10;
        $this->int = 10;
        $this->wis = 10;
        $this->cha = 10;
        $this->save();
    }

    public function addRace(Race $race)
    {
        $this->race_id = $race->id;
        $this->save();

        return $this;
    }

    public function addLevel(BaseClass $class, int $levelAdded = 1)
    {
        for ($i = $this->level; $i < ($this->level + $levelAdded); $i++) {
            $this->levels()->attach($class->id, ['level' => $i + 1]);
        }

        $this->increment('level', $levelAdded);

        return $this;
    }

    public function levels()
    {
        return $this->belongsToMany(BaseClass::class, 'dnd35_characters_levels', 'character_id', 'class_id')
            ->withTimestamps();
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function getClassAttribute()
    {
        $data = [];
        foreach ($this->levels as $class) {
            $data[$class->id] = $class->name;
        }

        return implode(' / ', $data);
    }

    public function getClassAndLevelAttribute()
    {
        $data = [];
        foreach ($this->levels as $class) {
            $classLevel = $this->levels()->where('class_id', $class->id)->count();
            $data[$class->id] = $class->name . ' ' . $classLevel;
        }

        return implode(' / ', $data);
    }

    public function addAbilityModifier(string $ability, int $modifier, string $reason)
    {
        $this->increment($ability, $modifier);

        return $this;
    }

    public function getAbilityModifier(string $ability)
    {
        return floor(($this->$ability - 10) / 2);
    }
}

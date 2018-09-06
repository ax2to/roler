<?php

namespace Tests\Unit\DnD35;

use App\Models\DnD35\BaseClass;
use App\Models\DnD35\Character;
use App\Models\DnD35\Race;
use Tests\TestCase;

class CharacterTest extends TestCase
{
    public function testCreate()
    {
        $character = new Character('Elias Soul', 1, 1);
        $this->assertEquals('Elias Soul', $character->name);

        $character->addRace(Race::find(Race::CORE_HUMAN));
        $this->assertEquals('Human', $character->race->name);

        $character->addLevel(BaseClass::find(BaseClass::CORE_CLERIC), 1);
        $this->assertEquals(1, $character->level);
        $this->assertEquals('Cleric', $character->class);
        $this->assertEquals('Cleric 1', $character->classAndLevel);

        $character->addLevel(BaseClass::find(BaseClass::CORE_CLERIC), 2);
        $this->assertEquals(3, $character->level);
        $this->assertEquals('Cleric', $character->class);
        $this->assertEquals('Cleric 3', $character->classAndLevel);

        $character->addAbilityModifier(Character::ABILITY_STR, -4, 'Base value');
        $character->addAbilityModifier(Character::ABILITY_WIS, 8, 'Base value');
        $this->assertEquals(6, $character->str);
        $this->assertEquals(10, $character->dex);
        $this->assertEquals(10, $character->con);
        $this->assertEquals(10, $character->int);
        $this->assertEquals(18, $character->wis);
        $this->assertEquals(10, $character->cha);

        $this->assertEquals(4, $character->getAbilityModifier(Character::ABILITY_WIS));
        $this->assertEquals(-2, $character->getAbilityModifier(Character::ABILITY_STR));

        $this->assertEquals(8, $character->hit_points);
    }
}

<?php

namespace Blocks;

use Mockery as m;
use PHPUnit_Framework_TestCase;

class CocktailRecipes_IngredientsBlockTypeTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->blocktype = new CocktailRecipes_IngredientsBlockType();

        // inject service dependencies
        $this->cocktailRecipes = m::mock('Blocks\CocktailRecipesService');
        $this->cocktailRecipes->shouldReceive('getIsInitialized')->andReturn(true);
        blx()->setComponent('cocktailRecipes', $this->cocktailRecipes);

        $this->templates = m::mock('Blocks\TemplatesService');
        $this->templates->shouldReceive('getIsInitialized')->andReturn(true);
        blx()->setComponent('templates', $this->templates);
    }

    public function testGetName()
    {
        $result = $this->blocktype->getName();

        $this->assertInternalType('string', $result);
        $this->assertNotEmpty($result);
    }

    public function testGetInputHtml()
    {
        $this->cocktailRecipes->shouldReceive('getAllIngredients')->once()->andReturn(array());

        $this->templates->shouldReceive('render')->once();
    }
}

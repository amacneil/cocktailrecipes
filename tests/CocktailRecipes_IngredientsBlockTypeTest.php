<?php

namespace Craft;

use Mockery as m;
use PHPUnit_Framework_TestCase;

class CocktailRecipes_IngredientsFieldTypeTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->fieldtype = new CocktailRecipes_IngredientsFieldType();

        // inject service dependencies
        $this->cocktailRecipes = m::mock('Craft\CocktailRecipesService');
        $this->cocktailRecipes->shouldReceive('getIsInitialized')->andReturn(true);
        craft()->setComponent('cocktailRecipes', $this->cocktailRecipes);

        $this->templates = m::mock('Craft\TemplatesService');
        $this->templates->shouldReceive('getIsInitialized')->andReturn(true);
        craft()->setComponent('templates', $this->templates);
    }

    public function testGetName()
    {
        $result = $this->fieldtype->getName();

        $this->assertInternalType('string', $result);
        $this->assertNotEmpty($result);
    }

    public function testGetInputHtml()
    {
        $this->cocktailRecipes->shouldReceive('getAllIngredients')->once()->andReturn(array());

        $this->templates->shouldReceive('render')->once();
    }
}

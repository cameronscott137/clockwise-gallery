<?php

namespace Laravel\Nova\Tests\Feature;

use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Tests\IntegrationTest;

class BooleanGroupTest extends IntegrationTest
{
    public function test_by_default_the_field_is_displayed_with_the_name_as_the_label()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create',
            'delete',
        ]);

        $this->assertEquals([
            ['name' => 'create', 'label' => 'create'],
            ['name' => 'delete', 'label' => 'delete'],
        ], $field->jsonSerialize()['options']);
    }

    public function test_the_field_is_displayed_with_friendly_labels()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create' => 'Create',
            'delete' => 'Delete',
        ]);

        $this->assertEquals([
            ['name' => 'create', 'label' => 'Create'],
            ['name' => 'delete', 'label' => 'Delete'],
        ], $field->jsonSerialize()['options']);
    }
}

<?php

namespace Tests\Unit;

use App\Models\Bodegas;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class BodegasTest extends TestCase
{
    public function test_a_category_has_many_post()
    {
        $bodegas = new Bodegas();

        $this->assertInstanceOf(Collection::class, $bodegas->historiales);
    }
}

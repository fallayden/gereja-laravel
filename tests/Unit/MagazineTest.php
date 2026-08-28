<?php

namespace Tests\Unit;

use App\Models\Magazine;
use PHPUnit\Framework\TestCase;

class MagazineTest extends TestCase
{
    public function test_edition_label_always_has_a_single_edition_prefix(): void
    {
        $magazine = new Magazine(['edition_number' => '126']);
        $this->assertSame('Edisi 126', $magazine->edition_label);

        $magazine->edition_number = 'Edisi 127';
        $this->assertSame('Edisi 127', $magazine->edition_label);
    }
}

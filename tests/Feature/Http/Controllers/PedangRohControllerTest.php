<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PedangRohControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_pdf_can_be_viewed_when_title_contains_invalid_filename_characters(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('magazines/test.pdf', '%PDF-1.4');
        $magazine = Magazine::create([
            'title' => 'TRADISI SESAT: BAPA/SETAN\\GEREJA',
            'edition_number' => '123',
            'publish_date' => '2025-06-01',
            'pdf_file' => 'magazines/test.pdf',
        ]);

        $response = $this->get(route('pedang-roh.view', $magazine));

        $response
            ->assertOk()
            ->assertHeader('content-type', 'application/pdf')
            ->assertHeaderContains(
                'content-disposition',
                'TRADISI SESAT- BAPA-SETAN-GEREJA.pdf'
            );
    }

    public function test_pdf_can_be_downloaded_when_title_contains_invalid_filename_characters(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('magazines/test.pdf', '%PDF-1.4');
        $magazine = Magazine::create([
            'title' => 'TRADISI SESAT: BAPA/SETAN\\GEREJA',
            'edition_number' => '123',
            'publish_date' => '2025-06-01',
            'pdf_file' => 'magazines/test.pdf',
        ]);

        $response = $this->get(route('pedang-roh.download', $magazine));

        $response->assertDownload('TRADISI SESAT- BAPA-SETAN-GEREJA.pdf');
    }
}

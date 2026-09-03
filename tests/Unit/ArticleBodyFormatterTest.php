<?php

namespace Tests\Unit;

use App\Support\ArticleBodyFormatter;
use PHPUnit\Framework\TestCase;

class ArticleBodyFormatterTest extends TestCase
{
    public function test_it_normalizes_pasted_text_without_removing_paragraphs(): void
    {
        $body = "  Paragraf pertama dengan   banyak spasi.\r\n"
            ."\tBaris kedua.\r\n\r\n\r\n\r\n"
            ."\u{00A0}Paragraf berikutnya.  ";

        $this->assertSame(
            "Paragraf pertama dengan banyak spasi.\nBaris kedua.\n\nParagraf berikutnya.",
            ArticleBodyFormatter::normalize($body)
        );
    }
}

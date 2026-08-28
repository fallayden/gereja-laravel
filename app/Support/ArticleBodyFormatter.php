<?php

namespace App\Support;

final class ArticleBodyFormatter
{
    public static function normalize(string $body): string
    {
        $body = str_replace(["\r\n", "\r", "\u{00A0}"], ["\n", "\n", ' '], $body);
        $lines = preg_split('/\n/u', $body) ?: [];

        $lines = array_map(static function (string $line): string {
            $line = preg_replace('/[\p{Z}\t]+/u', ' ', $line) ?? $line;

            return trim($line);
        }, $lines);

        $normalized = implode("\n", $lines);
        $normalized = preg_replace('/\n{3,}/', "\n\n", $normalized) ?? $normalized;

        return trim($normalized);
    }
}

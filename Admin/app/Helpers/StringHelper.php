<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    /**
     * Generates an acronym from a given string.
     *
     * It handles standard space-separated words, hyphens, and removes common articles/prepositions.
     *
     * @param string $string The input string (e.g., "North Atlantic Treaty Organization").
     * @return string The generated acronym (e.g., "NATO").
     */
    public static function createAcronym(string $string): string
    {
        // Define common articles, conjunctions, and prepositions to ignore
        $ignoreWords = ['a', 'an', 'the', 'and', 'or', 'of', 'in', 'on', 'at', 'with', 'for', 'to', 'from', 'by', 'as'];
        
        // 1. Clean up and replace non-letter/non-space characters with spaces (e.g., hyphens)
        $cleanString = Str::of($string)
                         ->replace(['-', '_'], ' ')
                         ->replaceMatches('/[^a-zA-Z\s]/', '') // Remove other special chars
                         ->toString();

        // 2. Split the string into words, filter out ignored words, and convert to uppercase
        $words = collect(explode(' ', $cleanString))
            ->filter(function ($word) use ($ignoreWords) {
                // Ignore empty strings, short words, and words in the ignore list (case-insensitive)
                $wordLower = Str::lower($word);
                return !empty($word) && !in_array($wordLower, $ignoreWords);
            })
            ->map(function ($word) {
                // Get the first letter of the word
                return Str::upper($word[0]);
            })
            ->implode(''); // Join the letters together

        return $words;
    }
}
<?php

namespace Ejntaylor\Vellum\Services;

use Exception;
use Symfony\Component\Yaml\Yaml;

class MarkdownService
{
    public function getFrontMatter(string $text): string
    {
        if (preg_match('/^---\s*(.*?)\s*---/s', $text, $matches)) {
            return $matches[1];
        }

        return '';
    }

    public function getContent(string $text): string
    {
        return preg_replace('/^---\s*.*?\s*---\s*/s', '', $text);
    }

    public function mergeFrontMatterAndContent(string $frontMatter, string $content): string
    {
        return "---\n".$frontMatter."\n---\n\n".$content;
    }

    public function validateFrontMatter(string $frontMatter): bool
    {
        if (trim($frontMatter) === '') {
            return false;
        }

        try {
            $parsedData = Yaml::parse($frontMatter);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}

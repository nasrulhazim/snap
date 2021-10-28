<?php

$finder = PhpCsFixer\Finder::create()
            ->in(__DIR__.'/app')
            ->in(__DIR__.'/config')
            ->in(__DIR__.'/database')
            ->in(__DIR__.'/resources/lang')
            ->in(__DIR__.'/routes')
            ->in(__DIR__.'/support')
            ->in(__DIR__.'/tests');

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(false)
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        // 'binary_operator_spaces' => ['align_double_arrow' => false, 'align_equals' => false],
        'increment_style' => ['style' => 'post'],
        'no_empty_comment' => false,
        'no_extra_blank_lines' => false,
        'no_unneeded_control_parentheses' => false,
        'not_operator_with_successor_space' => true,
        // 'imports_order' => ['sort_algorithm' => 'alpha'],
        'phpdoc_align' => ['tags' => ['param']],
        'phpdoc_no_empty_return' => false,
        'phpdoc_order' => true,
        'increment_style' => false,
        'single_trait_insert_per_statement' => false,
        'yoda_style' => false,
    ])
    ->setFinder($finder);

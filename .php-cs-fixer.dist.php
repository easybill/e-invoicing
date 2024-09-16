<?php

use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = (new PhpCsFixer\Finder())
    ->in([__DIR__ . '/src', __DIR__ . '/tests']);

return (new PhpCsFixer\Config())
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        '@PhpCsFixer' => true,
        'array_syntax' => ['syntax' => 'short'],
        'cast_spaces' => ['space' => 'none'],
        'concat_space' => ['spacing' => 'one'],
        'yoda_style' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'blank_line_before_statement' => false,
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_var_without_name' => false,
        'phpdoc_types_order' => false,
        'phpdoc_order' => false,
        'phpdoc_separation' => false,
        'class_definition' => false,
        'ternary_to_null_coalescing' => true,
        'php_unit_test_class_requires_covers' => false,
        'php_unit_internal_class' => false,
        'declare_strict_types' => true,
        'final_class' => true,
        'no_unused_imports' => true,
        'nullable_type_declaration_for_default_null_value' => false,
    ])
    ->setFinder($finder);

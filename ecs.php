<?php

declare(strict_types=1);

use PHP_CodeSniffer\Standards\Generic\Sniffs\VersionControl\GitMergeConflictSniff;
use PhpCsFixer\Fixer\Alias\MbStrFunctionsFixer;
use PhpCsFixer\Fixer\Alias\ModernizeStrposFixer;
use PhpCsFixer\Fixer\Alias\NoAliasFunctionsFixer;
use PhpCsFixer\Fixer\Alias\RandomApiMigrationFixer;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\Basic\PsrAutoloadingFixer;
use PhpCsFixer\Fixer\Casing\ConstantCaseFixer;
use PhpCsFixer\Fixer\Casing\LowercaseKeywordsFixer;
use PhpCsFixer\Fixer\Casing\LowercaseStaticReferenceFixer;
use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer;
use PhpCsFixer\Fixer\ClassNotation\FinalClassFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedInterfacesFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedTraitsFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedTypesFixer;
use PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfStaticAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleTraitInsertPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\ConstantNotation\NativeConstantInvocationFixer;
use PhpCsFixer\Fixer\ControlStructure\ElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\SimplifiedIfReturnFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NativeFunctionInvocationFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\StaticLambdaFixer;
use PhpCsFixer\Fixer\FunctionNotation\UseArrowFunctionsFixer;
use PhpCsFixer\Fixer\Import\GlobalNamespaceImportFixer;
use PhpCsFixer\Fixer\Import\GroupImportFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnneededImportAliasFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Import\SingleImportPerStatementFixer;
use PhpCsFixer\Fixer\Import\SingleLineAfterImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\GetClassToClassKeywordFixer;
use PhpCsFixer\Fixer\Naming\NoHomoglyphNamesFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAnnotationWithoutDotFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocLineSpanFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSummaryFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesOrderFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitConstructFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertInternalTypeFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitExpectationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitFqcnAnnotationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMockFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMockShortWillReturnFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitNamespacedFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitNoExpectationAnnotationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitSetUpTearDownVisibilityFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestAnnotationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestCaseStaticMethodCallsFixer;
use PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\Strict\StrictParamFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBetweenImportGroupsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

$workingDirectory = \getcwd() ?: __DIR__;

$existingPaths = \array_filter(
    [
        __FILE__,
        $workingDirectory . '/bin',
        $workingDirectory . '/config',
        $workingDirectory . '/data',
        $workingDirectory . '/ecs.php',
        $workingDirectory . '/index.php',
        $workingDirectory . '/module',
        $workingDirectory . '/public',
        $workingDirectory . '/rector.php',
        $workingDirectory . '/resource',
        $workingDirectory . '/src',
        $workingDirectory . '/test',
        $workingDirectory . '/tests',
    ],
    static fn (string $path): bool => \file_exists($path)
);

$existingSkips = \array_merge(
    \array_filter(
        [$workingDirectory . '/vendor', $workingDirectory . '/tests/Fixture'],
        static fn (string $path): bool => \file_exists($path)
    ),
    [
        SemicolonAfterInstructionFixer::class,
        '*/tests/Fixture/*',
        '*/vendor/*',
        GroupImportFixer::class,
        BinaryOperatorSpacesFixer::class,
        GeneralPhpdocAnnotationRemoveFixer::class,
        PhpdocLineSpanFixer::class,
        PhpdocTrimFixer::class,
        PhpUnitStrictFixer::class => ['tests/Unit/ParameterBuilderTest.php'],
    ]
);

return ECSConfig::configure()
    ->withCache($workingDirectory . '/.cache/ecs')
    ->withConfiguredRule(ArraySyntaxFixer::class, [
        'syntax' => 'short',
    ])
    ->withConfiguredRule(GlobalNamespaceImportFixer::class, [
        'import_classes' => true,
        'import_constants' => true,
        'import_functions' => true,
    ])
    ->withConfiguredRule(NativeConstantInvocationFixer::class, [
        'scope' => 'all',
        'fix_built_in' => true,
        'strict' => true,
    ])
    ->withConfiguredRule(NativeFunctionInvocationFixer::class, [
        'include' => ['@all'],
        'scope' => 'all',
        'strict' => true,
    ])
    ->withConfiguredRule(OrderedClassElementsFixer::class, [
        'case_sensitive' => true,
        'sort_algorithm' => 'alpha',
        'order' => [
            'use_trait',
            'case',
            //            'public',
            //            'protected',
            //            'private',
            //            'constant',
            'constant_public',
            'constant_protected',
            'constant_private',
            //            'property',
            'property_public',
            'property_protected',
            'property_private',
            'property_static',

            'property_public_readonly',
            'property_protected_readonly',
            'property_private_readonly',

            'property_public_static',
            'property_protected_static',
            'property_private_static',

            'phpunit',
            'construct',
            'destruct',
            'magic',
            //            'method',
            'method_abstract',
            'method_static',
            'method_public',
            'method_protected',
            'method_private',

            'method_public_abstract',
            'method_protected_abstract',
            'method_private_abstract',

            'method_public_abstract_static',
            'method_protected_abstract_static',
            'method_private_abstract_static',

            'method_public_static',
            'method_protected_static',
            'method_private_static',
        ],
    ])
    ->withConfiguredRule(OrderedImportsFixer::class, [
        'imports_order' => ['class', 'const', 'function'],
        'sort_algorithm' => 'alpha',
    ])
    ->withConfiguredRule(OrderedInterfacesFixer::class, [
        'order' => 'alpha',
    ])
    ->withConfiguredRule(PhpdocAlignFixer::class, [
        'tags' => ['method', 'param', 'property', 'return', 'throws', 'type', 'var'],
    ])
    ->withConfiguredRule(PhpUnitTestCaseStaticMethodCallsFixer::class, [
        'call_type' => 'self',
    ])
    ->withConfiguredRule(ConstantCaseFixer::class, [
        'case' => 'lower',
    ])
    ->withConfiguredRule(SingleImportPerStatementFixer::class, [
        'group_to_single_imports' => false,
    ])
    ->withConfiguredRule(GeneralPhpdocAnnotationRemoveFixer::class, [
        'annotations' => [
            'author',
            'covers',
            'group',
            'package',
            // 'since',
            'subpackage',
            // 'throws',
            'version',
        ],
    ])
    ->withConfiguredRule(MethodArgumentSpaceFixer::class, [
        'on_multiline' => 'ensure_fully_multiline',
    ])
    ->withConfiguredRule(SingleClassElementPerStatementFixer::class, [
        'elements' => ['property'],
    ])
    ->withConfiguredRule(ConcatSpaceFixer::class, [
        'spacing' => 'one',
    ])
    ->withConfiguredRule(VisibilityRequiredFixer::class, [
        'elements' => ['const', 'method', 'property'],
    ])
    ->withParallel()
    ->withPaths($existingPaths)
    ->withPhpCsFixerSets(
        php54Migration: true,
        php56MigrationRisky: true,
        php70Migration: true,
        php70MigrationRisky: true,
        php71Migration: true,
        php71MigrationRisky: true,
        php73Migration: true,
        php74Migration: true,
        php74MigrationRisky: true,
        php80Migration: true,
        php80MigrationRisky: true,
        php81Migration: true,
        php82Migration: true,
        php83Migration: true,
        phpunit30MigrationRisky: true,
        phpunit32MigrationRisky: true,
        phpunit35MigrationRisky: true,
        phpunit43MigrationRisky: true,
        phpunit48MigrationRisky: true,
        phpunit50MigrationRisky: true,
        phpunit52MigrationRisky: true,
        phpunit54MigrationRisky: true,
        phpunit55MigrationRisky: true,
        phpunit56MigrationRisky: true,
        phpunit57MigrationRisky: true,
        phpunit60MigrationRisky: true,
        phpunit75MigrationRisky: true,
        phpunit84MigrationRisky: true,
        phpunit100MigrationRisky: true,
    )
    ->withPreparedSets(
        psr12: true,
        common: false,
        symplify: true,
        arrays: true,
        comments: true,
        docblocks: true,
        spaces: true,
        namespaces: true,
        controlStructures: true,
        phpunit: true,
        strict: true,
    )
    ->withRootFiles()
    ->withRules([
        BlankLineBetweenImportGroupsFixer::class,
        DeclareStrictTypesFixer::class,
        ElseifFixer::class,
        FinalClassFixer::class,
        // FullyQualifiedStrictTypesFixer::class,
        GetClassToClassKeywordFixer::class,
        GitMergeConflictSniff::class,
        LowercaseKeywordsFixer::class,
        LowercaseStaticReferenceFixer::class,
        MagicConstantCasingFixer::class,
        MagicMethodCasingFixer::class,
        MbStrFunctionsFixer::class,
        ModernizeStrposFixer::class,
        NoAliasFunctionsFixer::class,
        NoEmptyStatementFixer::class,
        NoHomoglyphNamesFixer::class,
        NoLeadingImportSlashFixer::class,
        NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
        NoSuperfluousElseifFixer::class,
        NoUnneededImportAliasFixer::class,
        NoUnusedImportsFixer::class,
        OrderedTraitsFixer::class,
        OrderedTypesFixer::class,
        PhpdocAnnotationWithoutDotFixer::class,
        PhpdocOrderFixer::class,
        PhpdocSeparationFixer::class,
        PhpdocSummaryFixer::class,
        PhpdocTypesOrderFixer::class,
        PhpUnitConstructFixer::class,
        PhpUnitDedicateAssertFixer::class,
        PhpUnitDedicateAssertInternalTypeFixer::class,
        PhpUnitExpectationFixer::class,
        PhpUnitFqcnAnnotationFixer::class,
        PhpUnitMethodCasingFixer::class,
        PhpUnitMockFixer::class,
        PhpUnitMockShortWillReturnFixer::class,
        PhpUnitNamespacedFixer::class,
        PhpUnitNoExpectationAnnotationFixer::class,
        PhpUnitSetUpTearDownVisibilityFixer::class,
        PhpUnitStrictFixer::class,
        PhpUnitTestAnnotationFixer::class,
        ProtectedToPrivateFixer::class,
        PsrAutoloadingFixer::class,
        RandomApiMigrationFixer::class,
        ReturnTypeDeclarationFixer::class,
        SelfAccessorFixer::class,
        SelfStaticAccessorFixer::class,
        SemicolonAfterInstructionFixer::class,
        SimplifiedIfReturnFixer::class,
        SingleClassElementPerStatementFixer::class,
        SingleLineAfterImportsFixer::class,
        SingleTraitInsertPerStatementFixer::class,
        StaticLambdaFixer::class,
        StrictComparisonFixer::class,
        StrictParamFixer::class,
        UseArrowFunctionsFixer::class,
    ])
    ->withSkip($existingSkips);

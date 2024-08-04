<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodeQuality\Rector\ClassMethod\OptionalParametersAfterRequiredRector;
use Rector\CodeQuality\Rector\Foreach_\UnusedForeachValueToArrayKeysRector;
use Rector\CodeQuality\Rector\FuncCall\InlineIsAInstanceOfRector;
use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodingStyle\Rector\Assign\SplitDoubleAssignRector;
use Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector;
use Rector\CodingStyle\Rector\ClassConst\RemoveFinalFromConstRector;
use Rector\CodingStyle\Rector\ClassConst\SplitGroupedClassConstantsRector;
use Rector\CodingStyle\Rector\ClassMethod\FuncGetArgsToVariadicParamRector;
use Rector\CodingStyle\Rector\ClassMethod\MakeInheritedMethodVisibilitySameAsParentRector;
use Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\Encapsed\WrapEncapsedVariableInCurlyBracesRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncArrayToVariadicRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncToMethodCallRector;
use Rector\CodingStyle\Rector\FuncCall\ConsistentImplodeRector;
use Rector\CodingStyle\Rector\FuncCall\CountArrayToEmptyArrayComparisonRector;
use Rector\CodingStyle\Rector\FuncCall\StrictArraySearchRector;
use Rector\CodingStyle\Rector\FuncCall\VersionCompareFuncCallToConstantRector;
use Rector\CodingStyle\Rector\If_\NullableCompareToNullRector;
use Rector\CodingStyle\Rector\Property\SplitGroupedPropertiesRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\CodingStyle\Rector\Stmt\RemoveUselessAliasInUseStatementRector;
use Rector\CodingStyle\Rector\String_\SymplifyQuoteEscapeRector;
use Rector\CodingStyle\Rector\String_\UseClassKeywordForClassNameResolutionRector;
use Rector\CodingStyle\Rector\Ternary\TernaryConditionVariableAssignmentRector;
use Rector\CodingStyle\Rector\Use_\SeparateMultiUseImportsRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\If_\RemoveDeadInstanceOfRector;
use Rector\DeadCode\Rector\StaticCall\RemoveParentCallWithoutParentRector;
use Rector\EarlyReturn\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector;
use Rector\EarlyReturn\Rector\If_\ChangeIfElseValueAssignToEarlyReturnRector;
use Rector\EarlyReturn\Rector\If_\ChangeNestedIfsToEarlyReturnRector;
use Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector;
use Rector\EarlyReturn\Rector\If_\RemoveAlwaysElseRector;
use Rector\EarlyReturn\Rector\Return_\PreparedValueToEarlyReturnRector;
use Rector\EarlyReturn\Rector\Return_\ReturnBinaryOrToEarlyReturnRector;
use Rector\EarlyReturn\Rector\StmtsAwareInterface\ReturnEarlyIfVariableRector;
use Rector\Instanceof_\Rector\Ternary\FlipNegatedTernaryInstanceofRector;
use Rector\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector;
use Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameVariableToMatchNewTypeRector;
use Rector\Naming\Rector\Foreach_\RenameForeachValueVariableToMatchExprVariableRector;
use Rector\Naming\Rector\Foreach_\RenameForeachValueVariableToMatchMethodCallReturnTypeRector;
use Rector\Php52\Rector\Switch_\ContinueToBreakInSwitchRector;
use Rector\Php55\Rector\Class_\ClassConstantToSelfClassRector;
use Rector\Php55\Rector\ClassConstFetch\StaticToSelfOnFinalClassRector;
use Rector\Php55\Rector\FuncCall\GetCalledClassToSelfClassRector;
use Rector\Php55\Rector\FuncCall\GetCalledClassToStaticClassRector;
use Rector\Php55\Rector\FuncCall\PregReplaceEModifierRector;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\Php70\Rector\Assign\ListSplitStringRector;
use Rector\Php70\Rector\Assign\ListSwapArrayOrderRector;
use Rector\Php70\Rector\Break_\BreakNotInLoopOrSwitchToReturnRector;
use Rector\Php70\Rector\ClassMethod\Php4ConstructorRector;
use Rector\Php70\Rector\FuncCall\CallUserMethodRector;
use Rector\Php70\Rector\FuncCall\EregToPregMatchRector;
use Rector\Php70\Rector\FuncCall\MultiDirnameRector;
use Rector\Php70\Rector\FuncCall\RandomFunctionRector;
use Rector\Php70\Rector\FuncCall\RenameMktimeWithoutArgsToTimeRector;
use Rector\Php70\Rector\FunctionLike\ExceptionHandlerTypehintRector;
use Rector\Php70\Rector\If_\IfToSpaceshipRector;
use Rector\Php70\Rector\List_\EmptyListRector;
use Rector\Php70\Rector\MethodCall\ThisCallOnStaticMethodToStaticCallRector;
use Rector\Php70\Rector\StaticCall\StaticCallOnNonStaticToInstanceCallRector;
use Rector\Php70\Rector\StmtsAwareInterface\IfIssetToCoalescingRector;
use Rector\Php70\Rector\Switch_\ReduceMultipleDefaultSwitchRector;
use Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector;
use Rector\Php70\Rector\Ternary\TernaryToSpaceshipRector;
use Rector\Php70\Rector\Variable\WrapVariableVariableNameInCurlyBracesRector;
use Rector\Php71\Rector\Assign\AssignArrayToStringRector;
use Rector\Php71\Rector\BinaryOp\BinaryOpBetweenNumberAndStringRector;
use Rector\Php71\Rector\BooleanOr\IsIterableRector;
use Rector\Php71\Rector\ClassConst\PublicConstantVisibilityRector;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php71\Rector\List_\ListToArrayDestructRector;
use Rector\Php71\Rector\TryCatch\MultiExceptionCatchRector;
use Rector\Php72\Rector\Assign\ListEachRector;
use Rector\Php72\Rector\Assign\ReplaceEachAssignmentWithKeyCurrentRector;
use Rector\Php72\Rector\FuncCall\CreateFunctionToAnonymousFunctionRector;
use Rector\Php72\Rector\FuncCall\GetClassOnNullRector;
use Rector\Php72\Rector\FuncCall\ParseStrWithResultArgumentRector;
use Rector\Php72\Rector\FuncCall\StringifyDefineRector;
use Rector\Php72\Rector\FuncCall\StringsAssertNakedRector;
use Rector\Php72\Rector\Unset_\UnsetCastRector;
use Rector\Php72\Rector\While_\WhileEachToForeachRector;
use Rector\Php73\Rector\BooleanOr\IsCountableRector;
use Rector\Php73\Rector\ConstFetch\SensitiveConstantNameRector;
use Rector\Php73\Rector\FuncCall\ArrayKeyFirstLastRector;
use Rector\Php73\Rector\FuncCall\RegexDashEscapeRector;
use Rector\Php73\Rector\FuncCall\SensitiveDefineRector;
use Rector\Php73\Rector\FuncCall\SetCookieRector;
use Rector\Php73\Rector\FuncCall\StringifyStrNeedlesRector;
use Rector\Php73\Rector\String_\SensitiveHereNowDocRector;
use Rector\Php74\Rector\ArrayDimFetch\CurlyToSquareBracketArrayStringRector;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php74\Rector\Double\RealToFloatTypeCastRector;
use Rector\Php74\Rector\FuncCall\ArrayKeyExistsOnPropertyRector;
use Rector\Php74\Rector\FuncCall\FilterVarToAddSlashesRector;
use Rector\Php74\Rector\FuncCall\HebrevcToNl2brHebrevRector;
use Rector\Php74\Rector\FuncCall\MbStrrposEncodingArgumentPositionRector;
use Rector\Php74\Rector\FuncCall\MoneyFormatToNumberFormatRector;
use Rector\Php74\Rector\FuncCall\RestoreIncludePathToIniRestoreRector;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;
use Rector\Php74\Rector\StaticCall\ExportToReflectionFunctionRector;
use Rector\Php74\Rector\Ternary\ParenthesizeNestedTernaryRector;
use Rector\Php80\Rector\Catch_\RemoveUnusedVariableInCatchRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php80\Rector\Class_\StringableForToStringRector;
use Rector\Php80\Rector\ClassConstFetch\ClassOnThisVariableObjectRector;
use Rector\Php80\Rector\ClassMethod\AddParamBasedOnParentClassMethodRector;
use Rector\Php80\Rector\ClassMethod\FinalPrivateToPrivateVisibilityRector;
use Rector\Php80\Rector\ClassMethod\SetStateToStaticRector;
use Rector\Php80\Rector\FuncCall\ClassOnObjectRector;
use Rector\Php80\Rector\FunctionLike\MixedTypeRector;
use Rector\Php80\Rector\Identical\StrEndsWithRector;
use Rector\Php80\Rector\Identical\StrStartsWithRector;
use Rector\Php80\Rector\NotIdentical\StrContainsRector;
use Rector\Php80\Rector\Switch_\ChangeSwitchToMatchRector;
use Rector\Php80\Rector\Ternary\GetDebugTypeRector;
use Rector\Php81\Rector\Array_\FirstClassCallableRector;
use Rector\Php81\Rector\ClassMethod\NewInInitializerRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\Php82\Rector\Class_\ReadOnlyClassRector;
use Rector\Php82\Rector\Encapsed\VariableInStringInterpolationFixerRector;
use Rector\Php82\Rector\FuncCall\Utf8DecodeEncodeToMbConvertEncodingRector;
use Rector\Php82\Rector\New_\FilesystemIteratorSkipDotsRector;
use Rector\Php83\Rector\ClassConst\AddTypeToConstRector;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\AddSeeTestAnnotationRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\ConstructClassMethodToSetUpTestCaseRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\PHPUnit\CodeQuality\Rector\ClassMethod\RemoveEmptyTestMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\Foreach_\SimplifyForeachInstanceOfRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertCompareToSpecificMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertComparisonToSpecificMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertEmptyNullableObjectToAssertInstanceofRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertEqualsOrAssertSameFloatParameterToSpecificMethodsTypeRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertEqualsToSameRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertFalseStrposToContainsRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertInstanceOfComparisonRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertIssetToSpecificMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertNotOperatorRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertPropertyExistsRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertRegExpRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertSameBoolNullToSpecificMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertSameTrueFalseToAssertTrueFalseRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\AssertTrueFalseToSpecificMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\RemoveExpectAnyFromMockRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\UseSpecificWillMethodRector;
use Rector\PHPUnit\CodeQuality\Rector\MethodCall\UseSpecificWithMethodRector;
use Rector\PHPUnit\PHPUnit50\Rector\StaticCall\GetMockRector;
use Rector\PHPUnit\PHPUnit60\Rector\ClassMethod\ExceptionAnnotationRector;
use Rector\PHPUnit\PHPUnit60\Rector\MethodCall\DelegateExceptionArgumentsRector;
use Rector\PHPUnit\PHPUnit60\Rector\MethodCall\GetMockBuilderGetMockToCreateMockRector;
use Rector\PHPUnit\PHPUnit70\Rector\Class_\RemoveDataProviderTestPrefixRector;
use Rector\PHPUnit\PHPUnit80\Rector\MethodCall\AssertEqualsParameterToSpecificMethodsTypeRector;
use Rector\PHPUnit\PHPUnit80\Rector\MethodCall\SpecificAssertContainsRector;
use Rector\PHPUnit\PHPUnit80\Rector\MethodCall\SpecificAssertInternalTypeRector;
use Rector\PHPUnit\PHPUnit90\Rector\Class_\TestListenerToHooksRector;
use Rector\PHPUnit\PHPUnit90\Rector\MethodCall\ExplicitPhpErrorApiRector;
use Rector\PHPUnit\PHPUnit90\Rector\MethodCall\SpecificAssertContainsWithoutIdentityRector;
use Rector\PHPUnit\Rector\Class_\PreferPHPUnitSelfCallRector;
use Rector\PHPUnit\Rector\ClassMethod\CreateMockToAnonymousClassRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Privatization\Rector\ClassMethod\PrivatizeFinalClassMethodRector;
use Rector\Privatization\Rector\MethodCall\PrivatizeLocalGetterToPropertyRector;
use Rector\Privatization\Rector\Property\PrivatizeFinalClassPropertyRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Strict\Rector\BooleanNot\BooleanInBooleanNotRuleFixerRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\Strict\Rector\If_\BooleanInIfConditionRuleFixerRector;
use Rector\Strict\Rector\Ternary\BooleanInTernaryOperatorRuleFixerRector;
use Rector\Strict\Rector\Ternary\DisallowedShortTernaryRuleFixerRector;
use Rector\TypeDeclaration\Rector\BooleanAnd\BinaryOpNullableToInstanceofRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnNeverTypeRector;
use Rector\TypeDeclaration\Rector\Empty_\EmptyOnNullableObjectToInstanceOfRector;
use Rector\TypeDeclaration\Rector\While_\WhileNullableToInstanceofRector;
use Rector\ValueObject\PhpVersion;
use Rector\Visibility\Rector\ClassMethod\ExplicitPublicClassMethodRector;

$workingDirectory = \getcwd() ?: __DIR__;

$existingPaths = \array_filter(
    [
        $workingDirectory . '/bin',
        $workingDirectory . '/config',
        $workingDirectory . '/src',
        $workingDirectory . '/tests',
    ],
    static fn (string $path): bool => \file_exists($path)
);

$existingSkips = \array_merge(
    \array_filter([$workingDirectory . '/tests/Fixture'], static fn (string $path): bool => \file_exists($path)),
    ['Fixture', 'Analyzer']
);

return RectorConfig::configure()
    ->withAttributesSets(all: true)
    ->withCache(cacheDirectory: $workingDirectory . '/.cache/rector', cacheClass: FileCacheStorage::class)
    ->withConfiguredRule(RenameMethodRector::class, [
        new MethodCallRename(TestCase::class, 'setExpectedException', 'expectedException'),
        new MethodCallRename(TestCase::class, 'setExpectedExceptionRegExp', 'expectedException'),
    ])
    ->withImportNames(
        removeUnusedImports: true,
        importDocBlockNames: true,
        importNames: true,
        importShortClasses: true
    )
    ->withPaths($existingPaths)
    ->withPhpSets(php83: true)
    ->withPhpVersion(PhpVersion::PHP_10)
    ->withPreparedSets(
        deadCode: false,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true
    )
    ->withRootFiles()
    ->withRules([
        AddOverrideAttributeToOverriddenMethodsRector::class,
        AddParamBasedOnParentClassMethodRector::class,
        AddSeeTestAnnotationRector::class,
        AddTypeToConstRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        ArrayKeyExistsOnPropertyRector::class,
        ArrayKeyFirstLastRector::class,
        AssertCompareToSpecificMethodRector::class,
        AssertComparisonToSpecificMethodRector::class,
        AssertEmptyNullableObjectToAssertInstanceofRector::class,
        AssertEqualsOrAssertSameFloatParameterToSpecificMethodsTypeRector::class,
        AssertEqualsParameterToSpecificMethodsTypeRector::class,
        AssertEqualsToSameRector::class,
        AssertFalseStrposToContainsRector::class,
        AssertInstanceOfComparisonRector::class,
        AssertIssetToSpecificMethodRector::class,
        AssertNotOperatorRector::class,
        AssertPropertyExistsRector::class,
        AssertRegExpRector::class,
        AssertSameBoolNullToSpecificMethodRector::class,
        AssertSameTrueFalseToAssertTrueFalseRector::class,
        AssertTrueFalseToSpecificMethodRector::class,
        AssignArrayToStringRector::class,
        BinaryOpBetweenNumberAndStringRector::class,
        BinaryOpNullableToInstanceofRector::class,
        BooleanInBooleanNotRuleFixerRector::class,
        BooleanInIfConditionRuleFixerRector::class,
        BooleanInTernaryOperatorRuleFixerRector::class,
        BreakNotInLoopOrSwitchToReturnRector::class,
        CallUserFuncArrayToVariadicRector::class,
        CallUserFuncToMethodCallRector::class,
        CallUserMethodRector::class,
        CatchExceptionNameMatchingTypeRector::class,
        ChangeIfElseValueAssignToEarlyReturnRector::class,
        ChangeNestedForeachIfsToEarlyContinueRector::class,
        ChangeNestedIfsToEarlyReturnRector::class,
        ChangeOrIfContinueToMultiContinueRector::class,
        ChangeSwitchToMatchRector::class,
        ClassConstantToSelfClassRector::class,
        ClassOnObjectRector::class,
        ClassOnThisVariableObjectRector::class,
        ClassPropertyAssignToConstructorPromotionRector::class,
        ClosureToArrowFunctionRector::class,
        ConsistentImplodeRector::class,
        ConstructClassMethodToSetUpTestCaseRector::class,
        ContinueToBreakInSwitchRector::class,
        CountArrayToEmptyArrayComparisonRector::class,
        CreateFunctionToAnonymousFunctionRector::class,
        CreateMockToAnonymousClassRector::class,
        CurlyToSquareBracketArrayStringRector::class,
        DelegateExceptionArgumentsRector::class,
        DisallowedEmptyRuleFixerRector::class,
        DisallowedShortTernaryRuleFixerRector::class,
        EmptyListRector::class,
        EmptyOnNullableObjectToInstanceOfRector::class,
        EncapsedStringsToSprintfRector::class,
        EregToPregMatchRector::class,
        ExceptionAnnotationRector::class,
        ExceptionHandlerTypehintRector::class,
        ExplicitNullableParamTypeRector::class,
        ExplicitPhpErrorApiRector::class,
        ExplicitPublicClassMethodRector::class,
        ExportToReflectionFunctionRector::class,
        FilesystemIteratorSkipDotsRector::class,
        FilterVarToAddSlashesRector::class,
        FinalPrivateToPrivateVisibilityRector::class,
        FlipNegatedTernaryInstanceofRector::class,
        FlipTypeControlToUseExclusiveTypeRector::class,
        FuncGetArgsToVariadicParamRector::class,
        GetCalledClassToSelfClassRector::class,
        GetCalledClassToStaticClassRector::class,
        GetClassOnNullRector::class,
        GetDebugTypeRector::class,
        GetMockBuilderGetMockToCreateMockRector::class,
        GetMockRector::class,
        HebrevcToNl2brHebrevRector::class,
        IfIssetToCoalescingRector::class,
        IfToSpaceshipRector::class,
        InlineIsAInstanceOfRector::class,
        IsCountableRector::class,
        IsIterableRector::class,
        ListEachRector::class,
        ListSplitStringRector::class,
        ListSwapArrayOrderRector::class,
        ListToArrayDestructRector::class,
        MakeInheritedMethodVisibilitySameAsParentRector::class,
        MbStrrposEncodingArgumentPositionRector::class,
        MixedTypeRector::class,
        MoneyFormatToNumberFormatRector::class,
        MultiDirnameRector::class,
        MultiExceptionCatchRector::class,
        NewInInitializerRector::class,
        NewlineAfterStatementRector::class,
        NewlineBeforeNewAssignSetRector::class,
        NullCoalescingOperatorRector::class,
        NullToStrictStringFuncCallArgRector::class,
        NullableCompareToNullRector::class,
        OptionalParametersAfterRequiredRector::class,
        ParenthesizeNestedTernaryRector::class,
        ParseStrWithResultArgumentRector::class,
        Php4ConstructorRector::class,
        PreferPHPUnitSelfCallRector::class,
        PregReplaceEModifierRector::class,
        PreparedValueToEarlyReturnRector::class,
        PrivatizeFinalClassMethodRector::class,
        PrivatizeFinalClassPropertyRector::class,
        PrivatizeLocalGetterToPropertyRector::class,
        PublicConstantVisibilityRector::class,
        RandomFunctionRector::class,
        ReadOnlyClassRector::class,
        ReadOnlyPropertyRector::class,
        RealToFloatTypeCastRector::class,
        ReduceMultipleDefaultSwitchRector::class,
        RegexDashEscapeRector::class,
        RemoveAlwaysElseRector::class,
        RemoveDataProviderTestPrefixRector::class,
        RemoveDeadInstanceOfRector::class,
        RemoveEmptyTestMethodRector::class,
        RemoveExpectAnyFromMockRector::class,
        RemoveExtraParametersRector::class,
        RemoveFinalFromConstRector::class,
        RemoveParentCallWithoutParentRector::class,
        RemoveUnusedVariableInCatchRector::class,
        RemoveUselessAliasInUseStatementRector::class,
        RenameForeachValueVariableToMatchExprVariableRector::class,
        RenameForeachValueVariableToMatchMethodCallReturnTypeRector::class,
        RenameMktimeWithoutArgsToTimeRector::class,
        RenameParamToMatchTypeRector::class,
        RenamePropertyToMatchTypeRector::class,
        RenameVariableToMatchMethodCallReturnTypeRector::class,
        RenameVariableToMatchNewTypeRector::class,
        ReplaceEachAssignmentWithKeyCurrentRector::class,
        RestoreDefaultNullToNullableTypePropertyRector::class,
        RestoreIncludePathToIniRestoreRector::class,
        ReturnBinaryOrToEarlyReturnRector::class,
        ReturnEarlyIfVariableRector::class,
        ReturnNeverTypeRector::class,
        SensitiveConstantNameRector::class,
        SensitiveDefineRector::class,
        SensitiveHereNowDocRector::class,
        SeparateMultiUseImportsRector::class,
        SetCookieRector::class,
        SetStateToStaticRector::class,
        SimplifyForeachInstanceOfRector::class,
        SpecificAssertContainsRector::class,
        SpecificAssertContainsWithoutIdentityRector::class,
        SpecificAssertInternalTypeRector::class,
        SplitDoubleAssignRector::class,
        SplitGroupedClassConstantsRector::class,
        SplitGroupedPropertiesRector::class,
        StaticCallOnNonStaticToInstanceCallRector::class,
        StaticToSelfOnFinalClassRector::class,
        StrContainsRector::class,
        StrEndsWithRector::class,
        StrStartsWithRector::class,
        StrictArraySearchRector::class,
        StringClassNameToClassConstantRector::class,
        StringableForToStringRector::class,
        StringifyDefineRector::class,
        StringifyStrNeedlesRector::class,
        StringsAssertNakedRector::class,
        SymplifyQuoteEscapeRector::class,
        TernaryConditionVariableAssignmentRector::class,
        TernaryToNullCoalescingRector::class,
        TernaryToSpaceshipRector::class,
        TestListenerToHooksRector::class,
        ThisCallOnStaticMethodToStaticCallRector::class,
        UnsetCastRector::class,
        UseClassKeywordForClassNameResolutionRector::class,
        UseSpecificWillMethodRector::class,
        UseSpecificWithMethodRector::class,
        Utf8DecodeEncodeToMbConvertEncodingRector::class,
        VariableInStringInterpolationFixerRector::class,
        VersionCompareFuncCallToConstantRector::class,
        WhileEachToForeachRector::class,
        WhileNullableToInstanceofRector::class,
        WrapEncapsedVariableInCurlyBracesRector::class,
        WrapVariableVariableNameInCurlyBracesRector::class,
    ])
    ->withSets([
        PHPUnitSetList::PHPUNIT_100,
        PHPUnitSetList::PHPUNIT_110,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
    ])
    ->withSkip($existingSkips)
    ->withSkip(
        [
            PreferPHPUnitThisCallRector::class,
            UnusedForeachValueToArrayKeysRector::class,
            FirstClassCallableRector::class,
        ]
    );

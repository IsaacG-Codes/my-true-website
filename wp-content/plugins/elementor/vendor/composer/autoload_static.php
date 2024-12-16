<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit175d29babee7e330d642b349f38630ac
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'ElementorDeps\\DI\\Annotation\\Inject' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Annotation/Inject.php',
        'ElementorDeps\\DI\\Annotation\\Injectable' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Annotation/Injectable.php',
        'ElementorDeps\\DI\\CompiledContainer' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/CompiledContainer.php',
        'ElementorDeps\\DI\\Compiler\\Compiler' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Compiler/Compiler.php',
        'ElementorDeps\\DI\\Compiler\\ObjectCreationCompiler' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Compiler/ObjectCreationCompiler.php',
        'ElementorDeps\\DI\\Compiler\\RequestedEntryHolder' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Compiler/RequestedEntryHolder.php',
        'ElementorDeps\\DI\\Container' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Container.php',
        'ElementorDeps\\DI\\ContainerBuilder' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/ContainerBuilder.php',
        'ElementorDeps\\DI\\Definition\\ArrayDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ArrayDefinition.php',
        'ElementorDeps\\DI\\Definition\\ArrayDefinitionExtension' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ArrayDefinitionExtension.php',
        'ElementorDeps\\DI\\Definition\\AutowireDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/AutowireDefinition.php',
        'ElementorDeps\\DI\\Definition\\DecoratorDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/DecoratorDefinition.php',
        'ElementorDeps\\DI\\Definition\\Definition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Definition.php',
        'ElementorDeps\\DI\\Definition\\Dumper\\ObjectDefinitionDumper' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Dumper/ObjectDefinitionDumper.php',
        'ElementorDeps\\DI\\Definition\\EnvironmentVariableDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/EnvironmentVariableDefinition.php',
        'ElementorDeps\\DI\\Definition\\Exception\\InvalidAnnotation' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Exception/InvalidAnnotation.php',
        'ElementorDeps\\DI\\Definition\\Exception\\InvalidDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Exception/InvalidDefinition.php',
        'ElementorDeps\\DI\\Definition\\ExtendsPreviousDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ExtendsPreviousDefinition.php',
        'ElementorDeps\\DI\\Definition\\FactoryDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/FactoryDefinition.php',
        'ElementorDeps\\DI\\Definition\\Helper\\AutowireDefinitionHelper' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Helper/AutowireDefinitionHelper.php',
        'ElementorDeps\\DI\\Definition\\Helper\\CreateDefinitionHelper' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Helper/CreateDefinitionHelper.php',
        'ElementorDeps\\DI\\Definition\\Helper\\DefinitionHelper' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Helper/DefinitionHelper.php',
        'ElementorDeps\\DI\\Definition\\Helper\\FactoryDefinitionHelper' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Helper/FactoryDefinitionHelper.php',
        'ElementorDeps\\DI\\Definition\\InstanceDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/InstanceDefinition.php',
        'ElementorDeps\\DI\\Definition\\ObjectDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ObjectDefinition.php',
        'ElementorDeps\\DI\\Definition\\ObjectDefinition\\MethodInjection' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ObjectDefinition/MethodInjection.php',
        'ElementorDeps\\DI\\Definition\\ObjectDefinition\\PropertyInjection' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ObjectDefinition/PropertyInjection.php',
        'ElementorDeps\\DI\\Definition\\Reference' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Reference.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\ArrayResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/ArrayResolver.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\DecoratorResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/DecoratorResolver.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\DefinitionResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/DefinitionResolver.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\EnvironmentVariableResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/EnvironmentVariableResolver.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\FactoryResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/FactoryResolver.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\InstanceInjector' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/InstanceInjector.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\ObjectCreator' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/ObjectCreator.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\ParameterResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/ParameterResolver.php',
        'ElementorDeps\\DI\\Definition\\Resolver\\ResolverDispatcher' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Resolver/ResolverDispatcher.php',
        'ElementorDeps\\DI\\Definition\\SelfResolvingDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/SelfResolvingDefinition.php',
        'ElementorDeps\\DI\\Definition\\Source\\AnnotationBasedAutowiring' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/AnnotationBasedAutowiring.php',
        'ElementorDeps\\DI\\Definition\\Source\\Autowiring' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/Autowiring.php',
        'ElementorDeps\\DI\\Definition\\Source\\DefinitionArray' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/DefinitionArray.php',
        'ElementorDeps\\DI\\Definition\\Source\\DefinitionFile' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/DefinitionFile.php',
        'ElementorDeps\\DI\\Definition\\Source\\DefinitionNormalizer' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/DefinitionNormalizer.php',
        'ElementorDeps\\DI\\Definition\\Source\\DefinitionSource' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/DefinitionSource.php',
        'ElementorDeps\\DI\\Definition\\Source\\MutableDefinitionSource' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/MutableDefinitionSource.php',
        'ElementorDeps\\DI\\Definition\\Source\\NoAutowiring' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/NoAutowiring.php',
        'ElementorDeps\\DI\\Definition\\Source\\ReflectionBasedAutowiring' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/ReflectionBasedAutowiring.php',
        'ElementorDeps\\DI\\Definition\\Source\\SourceCache' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/SourceCache.php',
        'ElementorDeps\\DI\\Definition\\Source\\SourceChain' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/Source/SourceChain.php',
        'ElementorDeps\\DI\\Definition\\StringDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/StringDefinition.php',
        'ElementorDeps\\DI\\Definition\\ValueDefinition' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Definition/ValueDefinition.php',
        'ElementorDeps\\DI\\DependencyException' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/DependencyException.php',
        'ElementorDeps\\DI\\FactoryInterface' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/FactoryInterface.php',
        'ElementorDeps\\DI\\Factory\\RequestedEntry' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Factory/RequestedEntry.php',
        'ElementorDeps\\DI\\Invoker\\DefinitionParameterResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Invoker/DefinitionParameterResolver.php',
        'ElementorDeps\\DI\\Invoker\\FactoryParameterResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Invoker/FactoryParameterResolver.php',
        'ElementorDeps\\DI\\NotFoundException' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/NotFoundException.php',
        'ElementorDeps\\DI\\Proxy\\ProxyFactory' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/php-di/src/Proxy/ProxyFactory.php',
        'ElementorDeps\\Invoker\\CallableResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/CallableResolver.php',
        'ElementorDeps\\Invoker\\Exception\\InvocationException' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/Exception/InvocationException.php',
        'ElementorDeps\\Invoker\\Exception\\NotCallableException' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/Exception/NotCallableException.php',
        'ElementorDeps\\Invoker\\Exception\\NotEnoughParametersException' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/Exception/NotEnoughParametersException.php',
        'ElementorDeps\\Invoker\\Invoker' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/Invoker.php',
        'ElementorDeps\\Invoker\\InvokerInterface' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/InvokerInterface.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\AssociativeArrayResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/AssociativeArrayResolver.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\Container\\ParameterNameContainerResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/Container/ParameterNameContainerResolver.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\Container\\TypeHintContainerResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/Container/TypeHintContainerResolver.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\DefaultValueResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/DefaultValueResolver.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\NumericArrayResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/NumericArrayResolver.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\ParameterResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/ParameterResolver.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\ResolverChain' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/ResolverChain.php',
        'ElementorDeps\\Invoker\\ParameterResolver\\TypeHintResolver' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/ParameterResolver/TypeHintResolver.php',
        'ElementorDeps\\Invoker\\Reflection\\CallableReflection' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/invoker/src/Reflection/CallableReflection.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Contracts\\Serializable' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Contracts/Serializable.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Contracts\\Signer' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Contracts/Signer.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Exceptions\\InvalidSignatureException' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Exceptions/InvalidSignatureException.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Exceptions\\MissingSecretKeyException' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Exceptions/MissingSecretKeyException.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Exceptions\\PhpVersionNotSupportedException' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Exceptions/PhpVersionNotSupportedException.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\SerializableClosure' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/SerializableClosure.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Serializers\\Native' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Serializers/Native.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Serializers\\Signed' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Serializers/Signed.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Signers\\Hmac' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Signers/Hmac.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Support\\ClosureScope' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Support/ClosureScope.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Support\\ClosureStream' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Support/ClosureStream.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Support\\ReflectionClosure' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Support/ReflectionClosure.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\Support\\SelfReference' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/Support/SelfReference.php',
        'ElementorDeps\\Laravel\\SerializableClosure\\UnsignedSerializableClosure' => __DIR__ . '/../..' . '/vendor_prefixed/laravel/serializable-closure/src/UnsignedSerializableClosure.php',
        'ElementorDeps\\PhpDocReader\\AnnotationException' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/phpdoc-reader/src/PhpDocReader/AnnotationException.php',
        'ElementorDeps\\PhpDocReader\\PhpDocReader' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/phpdoc-reader/src/PhpDocReader/PhpDocReader.php',
        'ElementorDeps\\PhpDocReader\\PhpParser\\TokenParser' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/phpdoc-reader/src/PhpDocReader/PhpParser/TokenParser.php',
        'ElementorDeps\\PhpDocReader\\PhpParser\\UseStatementParser' => __DIR__ . '/../..' . '/vendor_prefixed/php-di/phpdoc-reader/src/PhpDocReader/PhpParser/UseStatementParser.php',
        'ElementorDeps\\Psr\\Container\\ContainerExceptionInterface' => __DIR__ . '/../..' . '/vendor_prefixed/psr/container/src/ContainerExceptionInterface.php',
        'ElementorDeps\\Psr\\Container\\ContainerInterface' => __DIR__ . '/../..' . '/vendor_prefixed/psr/container/src/ContainerInterface.php',
        'ElementorDeps\\Psr\\Container\\NotFoundExceptionInterface' => __DIR__ . '/../..' . '/vendor_prefixed/psr/container/src/NotFoundExceptionInterface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit175d29babee7e330d642b349f38630ac::$classMap;

        }, null, ClassLoader::class);
    }
}

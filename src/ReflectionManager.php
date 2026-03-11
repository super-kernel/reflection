<?php
declare(strict_types=1);

namespace SuperKernel\Reflector;

use BackedEnum;
use Closure;
use Fiber;
use Generator;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionConstant;
use ReflectionEnum;
use ReflectionEnumBackedCase;
use ReflectionEnumUnitCase;
use ReflectionExtension;
use ReflectionFiber;
use ReflectionFunction;
use ReflectionGenerator;
use ReflectionMethod;
use ReflectionObject;
use ReflectionProperty;
use ReflectionReference;
use ReflectionZendExtension;
use SuperKernel\Contract\ReflectorInterface;
use SuperKernel\Reflector\Provider\ReflectorProvider;
use UnitEnum;

/**
 * @mixin ReflectorInterface
 */
final class ReflectionManager
{

	private static ReflectorInterface $reflector;

	public static function reflectClass(object|string $class): ReflectionClass
	{
		return self::getReflector()->reflectClass($class);
	}

	public static function reflectClassConstant(string|object $class, string $constant): ReflectionClassConstant
	{
		return self::getReflector()->reflectClassConstant($class, $constant);
	}

	public static function reflectConstant(string $name): ReflectionConstant
	{
		return self::getReflector()->reflectConstant($name);
	}

	public static function reflectEnum(UnitEnum|string $class): ReflectionEnum
	{
		return self::getReflector()->reflectEnum($class);
	}

	public static function reflectEnumUnitCase(UnitEnum|string $class, string $constant): ReflectionEnumUnitCase
	{
		return self::getReflector()->reflectEnumUnitCase($class, $constant);
	}

	public static function reflectEnumBackedCase(BackedEnum|string $class, string $constant): ReflectionEnumBackedCase
	{
		return self::getReflector()->reflectEnumBackedCase($class, $constant);
	}

	public static function reflectZendExtension(string $name): ReflectionZendExtension
	{
		return self::getReflector()->reflectZendExtension($name);
	}

	public static function reflectExtension(string $name): ReflectionExtension
	{
		return self::getReflector()->reflectExtension($name);
	}

	public static function reflectFunction(string|Closure $function): ReflectionFunction
	{
		return self::getReflector()->reflectFunction($function);
	}

	public static function reflectMethod(object|string $class, string $method): ReflectionMethod
	{
		return self::getReflector()->reflectMethod($class, $method);
	}

	public static function reflectObject(object $class): ReflectionObject
	{
		return self::getReflector()->reflectObject($class);
	}

	public static function reflectProperty(object|string $class, string $property): ReflectionProperty
	{
		return self::getReflector()->reflectProperty($class, $property);
	}

	public static function reflectGenerator(Generator $generator): ReflectionGenerator
	{
		return self::getReflector()->reflectGenerator($generator);
	}

	public static function reflectFiber(Fiber $fiber): ReflectionFiber
	{
		return self::getReflector()->reflectFiber($fiber);
	}

	public static function reflectReference(array $array, int|string $key): ?ReflectionReference
	{
		return self::getReflector()->reflectReference($array, $key);
	}

	public static function getReflector(): ReflectorInterface
	{
		if (!isset(self::$reflector)) {
			self::$reflector = new ReflectorProvider()();
		}

		return self::$reflector;
	}
}
<?php
declare(strict_types=1);

namespace SuperKernel\Reflector\Provider;

use SuperKernel\Annotation\Factory;
use SuperKernel\Annotation\Provider;
use SuperKernel\Contract\ReflectorInterface;
use SuperKernel\Reflector\Reflector;

#[
	Provider(ReflectorInterface::class),
	Factory,
]
final class ReflectorProvider
{
	private static ReflectorInterface $reflector;

	public static function make(): ReflectorInterface
	{
		if (!isset(self::$reflector)) {
			self::$reflector = new Reflector();
		}

		return self::$reflector;
	}

	public function __invoke(): ReflectorInterface
	{
		return self::make();
	}
}
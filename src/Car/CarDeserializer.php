<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\PhpCar\Car\CarDecoder as CarCarDecoder;

readonly class CarDeserializer
{
    public function __construct(
        private TypeResolver $typeResolver,
        private CarCarDecoder $carDecoder,
    ) {}

    public static function default(): self
    {
        return new self(
            typeResolver: TypeResolver::default(),
            carDecoder: CarCarDecoder::new(),
        );
    }

    public function decodeString(string $car): CarRepo
    {
        $roots = [];
        $car = $this->carDecoder->decode($car);

        foreach ($car->header->roots() as $root) {
            $item = $car->blocks->items[$root]->toArray();
            \assert(\is_array($item));
            $roots[$root] = CarRoot::fromArray($item);
        }

        $visitor = new CarVisitor($this->typeResolver, $car);

        foreach ($roots as $cid => $root) {
            $visitor->visitRoot($root, $cid);
        }

        return $visitor->getDecoded();
    }
}

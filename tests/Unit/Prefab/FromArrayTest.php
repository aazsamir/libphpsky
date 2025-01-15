<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab;

use Tests\Unit\Prefab\Fixtures\DateTimeObject;
use Tests\Unit\Prefab\Fixtures\NullableObjectArray;
use Tests\Unit\Prefab\Fixtures\NullProperty;
use Tests\Unit\Prefab\Fixtures\ObjectArray;
use Tests\Unit\Prefab\Fixtures\ObjectProperty;
use Tests\Unit\Prefab\Fixtures\PlainObject;
use Tests\Unit\Prefab\Fixtures\UnionArrayObject;
use Tests\Unit\Prefab\Fixtures\UnionObject;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class FromArrayTest extends TestCase
{
    public function testPlainObject(): void
    {
        $object = $this->createPlainObject();
        $data = $object->toArray();

        $instance = PlainObject::fromArray($data);

        self::assertEquals($object, $instance);
        self::assertSame($object->toArray(), $instance->toArray());
    }

    public function testObjectArray(): void
    {
        $object = new ObjectArray();
        $object->objects = [
            $this->createPlainObject(),
            $this->createPlainObject(),
        ];
        $data = $object->toArray();

        $instance = ObjectArray::fromArray($data);

        self::assertEquals($object, $instance);
        self::assertSame($object->toArray(), $instance->toArray());
    }

    public function testNullableObjectArray(): void
    {
        $object = new NullableObjectArray();
        $object->objects = null;
        $data = $object->toArray();

        $instance = NullableObjectArray::fromArray($data);

        self::assertEquals($object, $instance);
        self::assertSame($object->toArray(), $instance->toArray());
    }

    public function testNullPropertyEmpty(): void
    {
        $instance = NullProperty::fromArray([]);

        self::assertNull($instance->id);
    }

    public function testNullPropertyNull(): void
    {
        $instance = NullProperty::fromArray([
            'id' => null,
        ]);

        self::assertNull($instance->id);
    }

    public function testUnion(): void
    {
        $data = [
            'union' => [
                '$type' => 'test.fixtures#null',
                'id' => 1,
            ],
        ];

        $instance = UnionObject::fromArray($data);

        self::assertInstanceOf(NullProperty::class, $instance->union);
    }

    public function testUnionArray(): void
    {
        $data = [
            'union' => [
                [
                    '$type' => 'test.fixtures#plain',
                    'id' => 1,
                    'name' => 'name',
                    'description' => 'description',
                    'active' => true,
                    'tags' => ['tag1', 'tag2'],
                ],
                [
                    '$type' => 'test.fixtures#null',
                    'id' => 1,
                ],
            ],
        ];

        $instance = UnionArrayObject::fromArray($data);

        self::assertInstanceOf(PlainObject::class, $instance->union[0]);
        self::assertInstanceOf(NullProperty::class, $instance->union[1]);
    }

    public function testObjectInObject(): void
    {
        $data = [
            'prop' => [
                'id' => 1,
            ],
        ];

        $instance = ObjectProperty::fromArray($data);

        self::assertInstanceOf(NullProperty::class, $instance->prop);
    }

    public function testNullObjectInObject(): void
    {
        $data = [
            'prop' => null,
        ];

        $instance = ObjectProperty::fromArray($data);

        self::assertNull($instance->prop);
    }

    public function testDateTimeObject(): void
    {
        $date = '2021-01-01T00:00:00Z';
        $data = [
            'date' => $date,
        ];

        $instance = DateTimeObject::fromArray($data);

        self::assertEquals(new \DateTimeImmutable($date), $instance->date);
    }

    private function createPlainObject(): PlainObject
    {
        $object = new PlainObject();
        $object->active = true;
        $object->description = 'description';
        $object->name = 'name';
        $object->id = 1;
        $object->tags = ['tag1', 'tag2'];

        return $object;
    }
}

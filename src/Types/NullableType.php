<?php

declare(strict_types=1);

namespace Spatie\Typed\Types;

use Spatie\Typed\Type;
use Spatie\Typed\Nullable;

final class NullableType implements Type, Nullable
{
    /** @var Type */
    private $type;

    public function __construct(Nullable $type)
    {
        $this->type = $type;
    }

    public function __invoke($value)
    {
        if ($value === null) {
            return;
        }

        return ($this->type)($value);
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function nullable(): self
    {
        return $this;
    }
}

<?php

namespace DutchCodingCompany\HetznerDnsClient\Objects;

use InvalidArgumentException;

class Zones
{
    /** @var \DutchCodingCompany\HetznerDnsClient\Objects\Zone[] */
    readonly public array $zones;

    final public function __construct(
        array $zones = [],
    ) {
        foreach ($zones as $zone) {
            if (! ($zone instanceof Zone)) {
                throw new InvalidArgumentException('All elements of $zones should be an instance of '.Zone::class);
            }
        }

        $this->zones = $zones;
    }

    public static function fromJsonArray(array $data): static
    {
        $zones = [];

        foreach($data as $entry) {
            $zones[] = Zone::fromJsonArray($entry);
        }

        return new static($zones);
    }
}

<?php

declare(strict_types=1);

namespace Shop;

final class Shop
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Blue cheese':
                    $this->updateBlueCheese($item);
                    break;
                case 'Concert tickets':
                    $this->updateConcertTickets($item);
                    break;
                case 'Mjolnir':
                    // Mjolnir does not change quality or sell_in
                    break;
                case 'Magic cake':
                    $this->updateMagicCake($item);
                    break;
                default:
                    $this->updateRegularItem($item);
            }
        }
    }

    private function updateRegularItem(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality -= 1;
        }

        $item->sell_in -= 1;

        if ($item->sell_in < 0 && $item->quality > 0) {
            $item->quality -= 1;
        }
    }

    private function updateBlueCheese(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality += 1;
        }

        $item->sell_in -= 1;

        if ($item->sell_in < 0 && $item->quality < 50) {
            $item->quality += 2;
        }
    }

    private function updateConcertTickets(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality += 1;

            if ($item->sell_in <= 10 && $item->quality < 50) {
                $item->quality += 1;
            }

            if ($item->sell_in <= 5 && $item->quality < 50) {
                $item->quality += 1;
            }
        }

        $item->sell_in -= 1;

        if ($item->sell_in < 0) {
            $item->quality = 0;
        }
    }

    private function updateMagicCake(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality -= 2;
        }

        $item->sell_in -= 1;

        if ($item->sell_in < 0 && $item->quality > 0) {
            $item->quality -= 2;
        }
    }
}
<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class Cart
{
    private const SESSION_KEY = 'cart';

    /**
     * Raw contents: [product_id => quantity]
     */
    private function contents(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    private function save(array $contents): void
    {
        Session::put(self::SESSION_KEY, $contents);
    }

    public function add(int $productId, int $quantity = 1): void
    {
        $quantity = max(1, $quantity);
        $contents = $this->contents();
        $contents[$productId] = ($contents[$productId] ?? 0) + $quantity;
        $this->save($contents);
    }

    public function update(int $productId, int $quantity): void
    {
        $contents = $this->contents();

        if ($quantity <= 0) {
            unset($contents[$productId]);
        } else {
            $contents[$productId] = $quantity;
        }

        $this->save($contents);
    }

    public function remove(int $productId): void
    {
        $contents = $this->contents();
        unset($contents[$productId]);
        $this->save($contents);
    }

    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    public function has(int $productId): bool
    {
        return array_key_exists($productId, $this->contents());
    }

    public function isEmpty(): bool
    {
        return empty($this->contents());
    }

    /**
     * Line items with the actual Product model loaded, skipping any
     * product IDs that no longer exist (e.g. deleted by an admin while
     * sitting in a customer's cart).
     */
    public function items(): Collection
    {
        $contents = $this->contents();

        if (empty($contents)) {
            return collect();
        }

        $products = Product::whereIn('id', array_keys($contents))->get()->keyBy('id');

        return collect($contents)
            ->map(function ($quantity, $productId) use ($products) {
                $product = $products->get($productId);

                if (! $product) {
                    return null;
                }

                return [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
            })
            ->filter()
            ->values();
    }

    public function count(): int
    {
        return count($this->contents());
    }
}

<?php

namespace App\Factory;

use App\Entity\Categorys;
use App\Repository\CategorysRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Categorys>
 *
 * @method static Categorys|Proxy createOne(array $attributes = [])
 * @method static Categorys[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Categorys|Proxy find(object|array|mixed $criteria)
 * @method static Categorys|Proxy findOrCreate(array $attributes)
 * @method static Categorys|Proxy first(string $sortedField = 'id')
 * @method static Categorys|Proxy last(string $sortedField = 'id')
 * @method static Categorys|Proxy random(array $attributes = [])
 * @method static Categorys|Proxy randomOrCreate(array $attributes = [])
 * @method static Categorys[]|Proxy[] all()
 * @method static Categorys[]|Proxy[] findBy(array $attributes)
 * @method static Categorys[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Categorys[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CategorysRepository|RepositoryProxy repository()
 * @method Categorys|Proxy create(array|callable $attributes = [])
 */
final class CategorysFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => substr(self::faker()->text(0,29),0,29),
            'url_img' => self::faker()->imageUrl(200,200, 'products', true),
            'description' => self::faker()->text(10),
            'id_user_ud' => self::faker()->numberBetween(1,10),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Categorys $categorys): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Categorys::class;
    }
}

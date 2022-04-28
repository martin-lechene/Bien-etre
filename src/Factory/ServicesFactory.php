<?php

namespace App\Factory;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Services>
 *
 * @method static Services|Proxy createOne(array $attributes = [])
 * @method static Services[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Services|Proxy find(object|array|mixed $criteria)
 * @method static Services|Proxy findOrCreate(array $attributes)
 * @method static Services|Proxy first(string $sortedField = 'id')
 * @method static Services|Proxy last(string $sortedField = 'id')
 * @method static Services|Proxy random(array $attributes = [])
 * @method static Services|Proxy randomOrCreate(array $attributes = [])
 * @method static Services[]|Proxy[] all()
 * @method static Services[]|Proxy[] findBy(array $attributes)
 * @method static Services[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Services[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ServicesRepository|RepositoryProxy repository()
 * @method Services|Proxy create(array|callable $attributes = [])
 */
final class ServicesFactory extends ModelFactory
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
            'nom' => self::faker()->name(),
            'siteweb' => self::faker()->url(),
            'num_tel'=> self::faker()->phoneNumber(),
            'num_tva' => self::faker()->numberBetween(100000000,999999999),
            'descript' => self::faker()->text(30),
            'website' => self::faker()->url(),
            'number_phone' => self::faker()->phoneNumber(),
            'number_tva' => self::faker()->numberBetween(100000000,999999999),
            'url_logo' => self::faker()->imageUrl(200,200, 'products', true),
            'desc_short' => self::faker()->text(10),
            'desc_long' => self::faker()->text(30),
            'date_create' => self::faker()->dateTime(),
            'is_visible_homepage' => self::faker()->boolean(),
            'is_valid' => self::faker()->boolean(),
            'img' => self::faker()->imageUrl(200,200, 'products', true),
            'user_id' => self::faker()->numberBetween(1,10),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Services $Services): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Services::class;
    }
}

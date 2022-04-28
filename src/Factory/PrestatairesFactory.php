<?php

namespace App\Factory;

use App\Entity\Prestataires;
use App\Repository\PrestatairesRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Prestataires>
 *
 * @method static Prestataires|Proxy createOne(array $attributes = [])
 * @method static Prestataires[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Prestataires|Proxy find(object|array|mixed $criteria)
 * @method static Prestataires|Proxy findOrCreate(array $attributes)
 * @method static Prestataires|Proxy first(string $sortedField = 'id')
 * @method static Prestataires|Proxy last(string $sortedField = 'id')
 * @method static Prestataires|Proxy random(array $attributes = [])
 * @method static Prestataires|Proxy randomOrCreate(array $attributes = [])
 * @method static Prestataires[]|Proxy[] all()
 * @method static Prestataires[]|Proxy[] findBy(array $attributes)
 * @method static Prestataires[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Prestataires[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PrestatairesRepository|RepositoryProxy repository()
 * @method Prestataires|Proxy create(array|callable $attributes = [])
 */
final class PrestatairesFactory extends ModelFactory
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
            'nom' => self::faker()->firstName(),
            'siteweb' => self::faker()->url(),
            'num_tel'=> self::faker()->phoneNumber(),
            'num_tva' => self::faker()->numberBetween(100000000,999999999),
            'description' => self::faker()->text(10),
            'num_comment' => self::faker()->numberBetween(1,10),
            'img_logo' => self::faker()->imageUrl(200,200, 'products', true),
            'is_public' => self::faker()->boolean(),
            'name' => self::faker()->company(),
            'name_street' => self::faker()->streetName(),
            'website' => self::faker()->url(),
            'number_phone' => self::faker()->phoneNumber(),
            'number_tva' => self::faker()->numberBetween(100000000,999999999),
            'url_logo' => self::faker()->imageUrl(200,200, 'products', true),
            'desc_short' => self::faker()->text(10),
            'desc_long' => self::faker()->text(30),
            'date_create' => self::faker()->dateTime(),
            'price' => self::faker()->numberBetween(1,100),
            'category_service' => self::faker()->text(100), 
            'num_street' => self::faker()->numberBetween(1,100),
            'name_city' => self::faker()->city(),
            'name_steet' => self::faker()->streetName(),
            'country' => self::faker()->country(),
            'num_postal' => self::faker()->postcode(),
            'service' => self::faker()->text(100),
            'num_like' => self::faker()->numberBetween(1,100),
            'img' => self::faker()->imageUrl(200,200, 'products', true),
            ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Prestataires $prestataires): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Prestataires::class;
    }
}

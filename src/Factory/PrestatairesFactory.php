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
            'is_public' => self::faker()->boolean(),
            'name' => self::faker()->company(),
            'website' => self::faker()->url(),
            'number_phone' => self::faker()->phoneNumber(),
            'number_tva' => self::faker()->numberBetween(100000000,999999999),
            'url_logo' => "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1806169b8ca%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1806169b8ca%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E",
            'desc_short' => self::faker()->text(10),
            'desc_long' => self::faker()->text(50),
            'date_create' => self::faker()->dateTime(),
            'price' => self::faker()->numberBetween(1,100),
            'category_service' => self::faker()->text(40),
            'num_street' => self::faker()->numberBetween(1,100),
            'name_city' => self::faker()->city(),
            'name_steet' => self::faker()->streetName(),
            'country' => self::faker()->country(),
            'num_postal' => self::faker()->postcode(),
            'num_like' => self::faker()->numberBetween(1,100),
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

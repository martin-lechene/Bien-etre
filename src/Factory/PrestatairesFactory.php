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
            'name' => self::faker()->firstName().substr(0,29),
            'website' => self::faker()->url(),
            //'descLong' => self::faker()->descript(),
            'numTva' => self::faker()->swiftBicNumber(),
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

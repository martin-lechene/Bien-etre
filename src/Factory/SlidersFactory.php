<?php

namespace App\Factory;

use App\Entity\Sliders;
use App\Repository\SlidersRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Sliders>
 *
 * @method static Sliders|Proxy createOne(array $attributes = [])
 * @method static Sliders[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Sliders|Proxy find(object|array|mixed $criteria)
 * @method static Sliders|Proxy findOrCreate(array $attributes)
 * @method static Sliders|Proxy first(string $sortedField = 'id')
 * @method static Sliders|Proxy last(string $sortedField = 'id')
 * @method static Sliders|Proxy rfandom(array $attributes = [])
 * @method static Sliders|Proxy randomOrCreate(array $attributes = [])
 * @method static Sliders[]|Proxy[] all()
 * @method static Sliders[]|Proxy[] findBy(array $attributes)
 * @method static Sliders[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Sliders[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SlidersRepository|RepositoryProxy repository()
 * @method Sliders|Proxy create(array|callable $attributes = [])
 */
final class SlidersFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject sliders if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-sliders)
    }

    protected function getDefaults(): array
    {
        return [

            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'url_img' => "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1806169b8ca%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1806169b8ca%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E",
            'en_avant' => self::faker()->boolean(),
            'descript' => self::faker()->text(30),
            'name' => substr(self::faker()->jobTitle(),0,29),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Sliders $Sliders): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Sliders::class;
    }
}

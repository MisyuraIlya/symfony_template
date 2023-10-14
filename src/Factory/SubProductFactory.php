<?php

namespace App\Factory;

use App\Entity\SubProduct;
use App\Repository\SubProductRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<SubProduct>
 *
 * @method        SubProduct|Proxy                     create(array|callable $attributes = [])
 * @method static SubProduct|Proxy                     createOne(array $attributes = [])
 * @method static SubProduct|Proxy                     find(object|array|mixed $criteria)
 * @method static SubProduct|Proxy                     findOrCreate(array $attributes)
 * @method static SubProduct|Proxy                     first(string $sortedField = 'id')
 * @method static SubProduct|Proxy                     last(string $sortedField = 'id')
 * @method static SubProduct|Proxy                     random(array $attributes = [])
 * @method static SubProduct|Proxy                     randomOrCreate(array $attributes = [])
 * @method static SubProductRepository|RepositoryProxy repository()
 * @method static SubProduct[]|Proxy[]                 all()
 * @method static SubProduct[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static SubProduct[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static SubProduct[]|Proxy[]                 findBy(array $attributes)
 * @method static SubProduct[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static SubProduct[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class SubProductFactory extends ModelFactory
{
    private const TREASURE_NAMES = ['סכין נקירי 14 ס"מ | KAI | SHUN PREMIER','מנדרל מחזיק דיסקיות נייר','תיסרוקל','העמסות נוספות אריזות יבוא','לקקן 25 ס"מ ידית פלסטיק .YU','צנתר רוסי פרח חיננית BEROX','סכין פירוק 13 ס"מ ידית כתומה| DICK | master grip','סכין בייגל 16 ס"מ | GLOBAL','סכין עזר 10 ס"מ להב שפיץ | GLOBAL','סכין קילוף 8 ס"מ | GLOBAL','סט 4 סכיני סטייק | GLOBAL'];

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'sku' => self::faker()->text(255),
            'title' => self::faker()->randomElement(self::TREASURE_NAMES),
            'description' => self::faker()->text(255),
            'barcode' => self::faker()->numberBetween(1000, 1000000),
            'isPublished' => self::faker()->boolean(),
            'parent' => ProductFactory::new(),
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),

        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(SubProduct $subProduct): void {})
        ;
    }

    protected static function getClass(): string
    {
        return SubProduct::class;
    }
}

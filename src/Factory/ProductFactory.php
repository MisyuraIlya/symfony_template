<?php

namespace App\Factory;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Product>
 *
 * @method        Product|Proxy                     create(array|callable $attributes = [])
 * @method static Product|Proxy                     createOne(array $attributes = [])
 * @method static Product|Proxy                     find(object|array|mixed $criteria)
 * @method static Product|Proxy                     findOrCreate(array $attributes)
 * @method static Product|Proxy                     first(string $sortedField = 'id')
 * @method static Product|Proxy                     last(string $sortedField = 'id')
 * @method static Product|Proxy                     random(array $attributes = [])
 * @method static Product|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ProductRepository|RepositoryProxy repository()
 * @method static Product[]|Proxy[]                 all()
 * @method static Product[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Product[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Product[]|Proxy[]                 findBy(array $attributes)
 * @method static Product[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Product[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ProductFactory extends ModelFactory
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
            'isPublished' => self::faker()->boolean(),
            'sku' =>self::faker()->numberBetween(1000, 1000000),
            'title' => self::faker()->randomElement(self::TREASURE_NAMES),
            'description' => self::faker()->text(255),
            'basePrice' => self::faker()->numberBetween(1, 3000),
            'packQuantity' => self::faker()->numberBetween(1, 12),
            'barcode' => self::faker()->numberBetween(1000, 1000000),
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTimeBetween('-2 year')),
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTimeBetween('-1 year')), // Added '=>' here
            'categoryLvl1' => CategoryFactory::new(),
            'categoryLvl2' => CategoryFactory::new(),
            'categoryLvl3' => CategoryFactory::new(),
            'stock' => 0,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Product $product): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Product::class;
    }
}

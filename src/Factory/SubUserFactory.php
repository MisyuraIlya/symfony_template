<?php

namespace App\Factory;

use App\Entity\SubUser;
use App\Repository\SubUserRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<SubUser>
 *
 * @method        SubUser|Proxy                     create(array|callable $attributes = [])
 * @method static SubUser|Proxy                     createOne(array $attributes = [])
 * @method static SubUser|Proxy                     find(object|array|mixed $criteria)
 * @method static SubUser|Proxy                     findOrCreate(array $attributes)
 * @method static SubUser|Proxy                     first(string $sortedField = 'id')
 * @method static SubUser|Proxy                     last(string $sortedField = 'id')
 * @method static SubUser|Proxy                     random(array $attributes = [])
 * @method static SubUser|Proxy                     randomOrCreate(array $attributes = [])
 * @method static SubUserRepository|RepositoryProxy repository()
 * @method static SubUser[]|Proxy[]                 all()
 * @method static SubUser[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static SubUser[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static SubUser[]|Proxy[]                 findBy(array $attributes)
 * @method static SubUser[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static SubUser[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class SubUserFactory extends ModelFactory
{
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
            'email' => self::faker()->email(),
            'extId' => self::faker()->numberBetween(1000000, 2000000),
            'name' => self::faker()->name(),
            'phone' => self::faker()->phoneNumber(),
            'password' => self::faker()->text(),
            'isBlocked' => self::faker()->boolean(),
            'isRegistered' => self::faker()->boolean(),
            'roles' => [],
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'user' => UserFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(SubUser $subUser): void {})
        ;
    }

    protected static function getClass(): string
    {
        return SubUser::class;
    }
}

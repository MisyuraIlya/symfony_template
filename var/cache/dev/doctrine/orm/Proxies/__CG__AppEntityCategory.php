<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Category extends \App\Entity\Category implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as __load;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'categories' => [parent::class, 'categories', null],
        "\0".parent::class."\0".'description' => [parent::class, 'description', null],
        "\0".parent::class."\0".'extId' => [parent::class, 'extId', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'image' => [parent::class, 'image', null],
        "\0".parent::class."\0".'isPublished' => [parent::class, 'isPublished', null],
        "\0".parent::class."\0".'lvlNumber' => [parent::class, 'lvlNumber', null],
        "\0".parent::class."\0".'orden' => [parent::class, 'orden', null],
        "\0".parent::class."\0".'parent' => [parent::class, 'parent', null],
        "\0".parent::class."\0".'productsLvl1' => [parent::class, 'productsLvl1', null],
        "\0".parent::class."\0".'productsLvl2' => [parent::class, 'productsLvl2', null],
        "\0".parent::class."\0".'productsLvl3' => [parent::class, 'productsLvl3', null],
        "\0".parent::class."\0".'title' => [parent::class, 'title', null],
        'categories' => [parent::class, 'categories', null],
        'description' => [parent::class, 'description', null],
        'extId' => [parent::class, 'extId', null],
        'id' => [parent::class, 'id', null],
        'image' => [parent::class, 'image', null],
        'isPublished' => [parent::class, 'isPublished', null],
        'lvlNumber' => [parent::class, 'lvlNumber', null],
        'orden' => [parent::class, 'orden', null],
        'parent' => [parent::class, 'parent', null],
        'productsLvl1' => [parent::class, 'productsLvl1', null],
        'productsLvl2' => [parent::class, 'productsLvl2', null],
        'productsLvl3' => [parent::class, 'productsLvl3', null],
        'title' => [parent::class, 'title', null],
    ];

    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {
        if ($cloner !== null) {
            return;
        }

        self::createLazyGhost($initializer, [
            "\0".parent::class."\0".'id' => true,
        ], $this);
    }

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"], $properties['__isCloning']);

        return $properties;
    }
}

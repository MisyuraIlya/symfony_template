<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerIMdYcq0\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerIMdYcq0/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerIMdYcq0.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerIMdYcq0\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerIMdYcq0\App_KernelDevDebugContainer([
    'container.build_hash' => 'IMdYcq0',
    'container.build_id' => '72b8a30b',
    'container.build_time' => 1699112821,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerIMdYcq0');

<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container6pzyC4l\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container6pzyC4l/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container6pzyC4l.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container6pzyC4l\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container6pzyC4l\App_KernelDevDebugContainer([
    'container.build_hash' => '6pzyC4l',
    'container.build_id' => '5600c97d',
    'container.build_time' => 1700678567,
], __DIR__.\DIRECTORY_SEPARATOR.'Container6pzyC4l');

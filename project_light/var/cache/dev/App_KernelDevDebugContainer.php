<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerULecdWd\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerULecdWd/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerULecdWd.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerULecdWd\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerULecdWd\App_KernelDevDebugContainer([
    'container.build_hash' => 'ULecdWd',
    'container.build_id' => '57776700',
    'container.build_time' => 1739209307,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerULecdWd');

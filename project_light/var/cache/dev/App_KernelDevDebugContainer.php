<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKlojmeh\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKlojmeh/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerKlojmeh.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerKlojmeh\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerKlojmeh\App_KernelDevDebugContainer([
    'container.build_hash' => 'Klojmeh',
    'container.build_id' => '6f1ca674',
    'container.build_time' => 1738686229,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerKlojmeh');

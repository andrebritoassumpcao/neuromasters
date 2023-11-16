<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->in(__DIR__)
    ->name('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->exclude('vendor')
    ->exclude('node_modules');

$config = new PhpCsFixer\Config();
return $config
    ->setRules([
        // Adicione regras específicas do Blade aqui
        'no_unused_imports' => true,
    ])
    ->setFinder($finder);

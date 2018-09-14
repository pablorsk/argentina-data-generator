<?php
$project_name = '';
$config = require __DIR__.'/../../vendor/reyesoft/ci/php/rules/php-cs-fixer.dist.php';

// rules override
$rules = array_merge(
    $config->getRules(),
    [
        'header_comment' => [
            'header' =>
                "Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.\n".
                "\n".
                "This file is part of ArgentinaDataGenerator. ArgentinaDataGenerator \n".
                "distributed under MIT Licence.",
            'commentType' => 'PHPDoc',
            'location' => 'after_open',
            'separate' => 'bottom'
        ],
    ]
);

return $config
    ->setRules($rules)
    ->setFinder(
        PhpCsFixer\Finder::create()
        ->in('./src')
        ->in('./tests')
    );

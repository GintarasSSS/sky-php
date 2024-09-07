<?php

namespace SkySportsTechTask\Events;

use SkySportsTechTask\Abstracts\AvailableEvenAbstract;

class FootballEvent extends AvailableEvenAbstract
{
    protected string $sport = 'football';

    protected array $types = [
        'kickoff',
        'goal',
        'yellowcard',
        'redcard',
        'penalty',
        'halftime',
        'fulltime',
        'extratime',
        'freekick',
        'corner',
    ];
}

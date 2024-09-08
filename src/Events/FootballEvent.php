<?php

namespace SkySportsTechTask\Events;

use SkySportsTechTask\Abstracts\AvailableEventAbstract;

class FootballEvent extends AvailableEventAbstract
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

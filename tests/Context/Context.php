<?php

declare(strict_types=1);

namespace App\Tests\Context;

use App\Tests\TestCase;
use Behat\Behat\Context\Context as ContextInterface;
use Behat\Behat\Context\Environment\InitializedContextEnvironment;
use Behat\Behat\Context\Exception\ContextNotFoundException;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Hook\BeforeScenario;
use PHPUnit\TextUI\Configuration\Builder;

abstract class Context extends TestCase implements ContextInterface
{
    protected ?InitializedContextEnvironment $env = null;

    /**
     * @api
     */
    #[BeforeScenario]
    public function gatherEnvironment(BeforeScenarioScope $scope): void
    {
        $environment = $scope->getEnvironment();

        if (!$environment instanceof InitializedContextEnvironment) {
            throw new ContextNotFoundException('Unsupported tests environment', static::class);
        }

        (new Builder())->build([]);

        $this->env = $environment;
    }

    /**
     * @template T of ContextInterface
     *
     * @param class-string<T> $context
     *
     * @return T
     * @throws ContextNotFoundException
     */
    protected function from(string $context): ContextInterface
    {
        if ($this->env === null) {
            throw new ContextNotFoundException('Uninitialized environment', static::class);
        }

        return $this->env->getContext($context);
    }
}

<?php

declare(strict_types=1);

class ProviderContext
{
    public const SEND_POST = 'post';
    public const SEND_GET = 'get';

    private array $strategyMapper;

    public function __construct(Provider $provider)
    {
        $this->strategyMapper = [
            static::SEND_POST => new SenderPost($provider),
            static::SEND_GET => new SenderGet($provider),
        ];
    }

    public function chooseSendMethod(string $type): AbstractSender
    {
        if (
            isset($this->strategyMapper[$type])
            && $this->strategyMapper[$type] instanceof AbstractSender
        ) {
            return $this->strategyMapper[$type];
        }

        throw new \RuntimeException(
            sprintf('Unrecognized sms provider "%s"', $type)
        );
    }
}

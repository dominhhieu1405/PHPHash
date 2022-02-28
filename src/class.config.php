<?php

namespace K6VN\PHPHash;

class Config
{
    /**
     * @var mixed[]
     */
    private $options;

    /**
     * @var int
     */
    private $algo;

    /**
     * Config constructor
     * @param int $algo
     * @param mixed[] $options
       + PASSWORD_DEFAULT
       + PASSWORD_BCRYPT
       + PASSWORD_ARGON2I
       + PASSWORD_ARGON2ID
     */
    public function __construct(string|int $algo = 1, array $options = [])
    {
        $this->algo = $algo;
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getAlgo(): string|int
    {
        return $this->algo;
    }

    /**
     * @return mixed[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}

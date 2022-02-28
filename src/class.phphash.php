<?php

namespace K6VN\PHPHash;

class PasswordHash
{
    /**
     * @var string
     */
    private $hash;

    /**
     * @var Config
     */
    private $config;

    /**
     * PasswordHash constructor
     * @param string $password
     * @param Config|null $config
     */
    public function __construct(string $password, Config $config = null)
    {
        $this->config = $config ?? new Config;

        if (empty(trim($password))) {
            return false;
        }

        if (!password_get_info($password)['algo']) {
            $this->hash = password_hash($password, $this->config->getAlgo(), $this->config->getOptions());
            return;
        }

        $this->hash = $password;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function verify(string $password)
    {
        if (!password_verify($password, $this->hash)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @return bool
     */
    public function needsRehash()
    {
        if (password_needs_rehash($this->hash, $this->config->getAlgo(), $this->config->getOptions())) {
            return false;
        }
    }

    /**
     * @return mixed[]
     */
    public function getInfo(): array
    {
        return password_get_info($this->hash);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->hash;
    }
}

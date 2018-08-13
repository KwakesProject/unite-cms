<?php

namespace UniteCMS\CoreBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Type;
use UniteCMS\CoreBundle\Validator\Constraints\ValidGraphQLQuery;
use UniteCMS\CoreBundle\Validator\Constraints\ValidWebhookAction;

/**
 * @ExclusionPolicy("none")
 */
class Webhook
{

    /**
     * @var string
     * @Assert\NotBlank(message="not_blank")
     * @ValidGraphQLQuery(message="invalid_query")
     * @Type("string")
     */
    private $query;

    /**
     * @var string
     * @Assert\NotBlank(message="not_blank")
     * @Assert\Length(max="255", maxMessage="too_long")
     * @Assert\Url(protocols={"http", "https"}, message="invalid_url")
     * @Type("string")
     */
    private $url;

    /**
     * @var bool
     * @Type("bool")
     */
    private $check_ssl;

    /**
     * @var string
     * @Assert\Length(min="8", max="32", minMessage="too_short", maxMessage="too_long")
     * @Type("string")
     */
    private $secret_key;

    /**
     * @var string
     * @Assert\NotBlank(message="not_blank")
     * @ValidWebhookAction(message="invalid_expression")
     * @Type("string")
     */
    private $action;

    public function __construct(string $query, string $url, string $action, bool $check_ssl = true, string $secret_key = '')
    {
        $this->query = $query;
        $this->url = $url;
        $this->check_ssl = $check_ssl;
        $this->secret_key = $secret_key;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return bool
     */
    public function getCheckSSL(): bool
    {
        return $this->check_ssl;
    }

    /**
     * @param bool $check_ssl
     */
    public function setCheckSSL(bool $check_ssl): void
    {
        $this->check_ssl = $check_ssl;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secret_key;
    }

    /**
     * @param string $secret_key
     */
    public function setSecretKey(string $secret_key): void
    {
        $this->secret_key = $secret_key;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }
}
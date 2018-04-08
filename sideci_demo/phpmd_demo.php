<?php

use Github\Client;

class Repository
{
    private $owner;
    private $name;
    private $isPublic;
    private $branches;
    private $token_api;

    const PUBLIC_VISIBILITY = 'public';

    /**
     * @param string $owner
     * @param string $name
     * @param string $visibility
     */
    public function __construct(string $owner, string $name, string $visibility)
    {
        $this->owner     = $owner;
        $this->name      = $name;
        $this->api_token = $_SERVER['API_TOKEN'];
        $this->isPublic  = $visibility === PUBLIC_VISIBILITY;
        $this->client    = new Client($this->api_token);
        $this->branches  = '';
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->owner . $this->name;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param string $title
     * @param string $description
     */
    public function createIssue(string $title, string $description)
    {
        $this->client->createIssue($this->getFullName, $title, $description);
    }
}

<?php

declare(strict_types=1);

namespace KeycloakAdmin\Factories;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use KeycloakAdmin\KeycloakAdmin;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;

class KeycloakAdminFactory
{
    public static function create(string $username, string $password, string $url)
    {
        AnnotationRegistry::registerLoader('class_exists');

        return new KeycloakAdmin(
            new Client(),
            new KeycloakAdminConfig(
                $username,
                $password,
                $url
            ),
            \JMS\Serializer\SerializerBuilder::create()->build()
        );
    }
}

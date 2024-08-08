<?php

namespace Drupal\iqvia_author\Resource;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\jsonapi\ResourceResponse;
use Drupal\jsonapi_resources\Resource\EntityQueryResourceBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Processes a jsonapi request for a author entity.
 *
 * @internal
 */
class AuthorContent extends EntityQueryResourceBase {

  /**
   * Process the resource request for author entity.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request.
   *
   * @return \Drupal\jsonapi\ResourceResponse
   *   The response.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function process(Request $request): ResourceResponse {

    // Get author id from the query string
    $author_id = $request->query->get('author_id');

    // Get API key from the request headers
    $api_key = $request->query->get('api_key');

    $cacheability = new CacheableMetadata();

    // Building the entity query with required conditions
    $entity = $this->getEntityQuery('author')
      ->condition('id', $author_id)
      ->condition('api_key', $api_key);

    $data = $this->loadResourceObjectDataFromEntityQuery($entity, $cacheability);

    // Successful response
    $response = $this->createJsonapiResponse($data, $request, 200, []);
    $response->addCacheableDependency($entity);

    return $response;
  }

}

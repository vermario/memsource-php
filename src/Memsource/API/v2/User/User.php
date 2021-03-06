<?php

namespace Memsource\API\v2\User;

use Memsource\API\BaseApi;
use Memsource\Model\Parameters;
use Symfony\Component\HttpFoundation\JsonResponse;

class User extends BaseApi {

  const PATH_BASE = 'v2/user/';
  const PATH_GET = self::PATH_BASE . 'get';
  const PATH_GET_BY_USER_NAME = self::PATH_BASE . 'getByUserName';
  const PATH_GET_LIMITS = self::PATH_BASE . 'getLimits';
  const PATH_LIST = self::PATH_BASE . 'list';

  /**
   * @return JsonResponse
   */
  public function listUsers() {
    return $this->memsource->post(self::PATH_LIST);
  }

  /**
   * @param string $userName
   * @return JsonResponse
   */
  public function getByUserName($userName) {
    $parameters = new Parameters();
    $parameters->userName = $userName;

    return $this->memsource->post(self::PATH_GET_BY_USER_NAME, $parameters);
  }

  /**
   * @return JsonResponse
   */
  public function getLimits() {
    return $this->memsource->post(self::PATH_GET_LIMITS);
  }

  /**
   * @param int $user
   * @return JsonResponse
   */
  public function getUser($user) {
    $parameters = new Parameters();
    $parameters->user = $user;

    return $this->memsource->post(self::PATH_GET, $parameters);
  }
}

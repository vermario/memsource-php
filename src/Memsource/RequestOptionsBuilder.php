<?php

namespace Memsource;

use GuzzleHttp\RequestOptions;
use Memsource\Model\Parameters;
use Symfony\Component\HttpFoundation\File\File;

class RequestOptionsBuilder {

  /**
   * @param Parameters $parameters
   * @param File $file
   * @return array
   */
  public function buildPostOptions(Parameters $parameters, File $file = NULL) {
    if ($file) {
      $options = $this->buildMultipartPostOptions($parameters, $file);
    } else {
      $options = [RequestOptions::FORM_PARAMS => $parameters];
    }

    return $options;
  }

  /**
   * @param Parameters $parameters
   * @param File $file
   * @return array
   */
  private function buildMultipartPostOptions(Parameters $parameters, File $file) {
    $formParameters = [];

    $formParameters[] = [
      'name' => 'file',
      'contents' => fopen($file->getPathname(), 'r'),
      'filename' => $file->getFilename(),
    ];

    foreach ($parameters as $key => $value) {
      $formParameters[] = ['name' => $key, 'contents' => $value];
    }

    $options = [RequestOptions::MULTIPART => $formParameters];

    return $options;
  }
}
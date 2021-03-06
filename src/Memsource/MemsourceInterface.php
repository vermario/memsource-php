<?php

namespace Memsource;

use GuzzleHttp\Promise\PromiseInterface;
use Memsource\Model\Parameters;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;

interface MemsourceInterface {

  /**
   * @param Parameters $parameters
   * @param File $file
   * @return JsonResponse
   */
  public function createJob(Parameters $parameters, File $file);

  /**
   * @param Parameters $parameters
   * @param File $file
   * @return PromiseInterface
   */
  public function createJobAsync(Parameters $parameters, File $file);

  /**
   * @param int $template
   * @param string $name
   * @param int|null $dateDue Unix timestamp in UTC time. Will be automatically converted to yyyy-MM-dd HH:mm format.
   * @param string|null $note
   * @param string|null $sourceLang
   * @param string|null $targetLang
   * @param int|null $workflowStep
   * @return JsonResponse
   */
  public function createProjectFromTemplate($template, $name, $dateDue = NULL, $note = NULL, $sourceLang = NULL, $targetLang = NULL, $workflowStep = NULL);

  /**
   * @param int $project
   * @return JsonResponse
   */
  public function deleteProject($project);

  /**
   * @param int $jobPart
   * @param string $outputPath
   * @return JsonResponse
   */
  public function getCompletedFile($jobPart, $outputPath);

  /**
   * @param int $template
   * @return JsonResponse
   */
  public function getEmailTemplate($template);

  /**
   * @param $jobPart
   * @return JsonResponse
   */
  public function getJob($jobPart);

  /**
   * @param int $project
   * @return JsonResponse
   */
  public function getProject($project);

  /**
   * @param int $termBase
   * @return JsonResponse
   */
  public function getTermBase($termBase);

  /**
   * @param int $user
   * @return JsonResponse
   */
  public function getUser($user);

  /**
   * @param string $userName
   * @return JsonResponse
   */
  public function getUserByName($userName);

  /**
   * @return JsonResponse
   */
  public function getUserLimits();

  /**
   * @param int $project
   * @return JsonResponse
   */
  public function listAnalysesByProject($project);

  /**
   * @return JsonResponse
   */
  public function listBusinessUnits();

  /**
   * @return JsonResponse
   */
  public function listDomains();

  /**
   * @param string|null $type See EmailTemplateType.
   * @return JsonResponse
   */
  public function listEmailTemplates($type = NULL);

  /**
   * @param int $jobPart
   * @return JsonResponse
   */
  public function listJobs($jobPart);

  /**
   * @param int|null $page
   * @param int $project
   * @param int|null $workflowLevel
   * @param int|null $assignedTo
   * @param string|null $status @see JobFilter
   * @return JsonResponse
   */
  public function listJobsByProject($page = NULL, $project, $workflowLevel = NULL, $assignedTo = NULL, $status = NULL);

  /**
   * @return JsonResponse
   */
  public function listMachineTranslateSettings();

  /**
   * @return JsonResponse
   */
  public function listProjects();

  /**
   * @return JsonResponse
   */
  public function listProjectTemplates();

  /**
   * @return JsonResponse
   */
  public function listSupportedLanguages();

  /**
   * @return JsonResponse
   */
  public function listTermBases();

  /**
   * @return JsonResponse
   */
  public function listTranslationMemories();

  /**
   * @return JsonResponse
   */
  public function listUsers();

  /**
   * @return JsonResponse
   */
  public function listVendors();

  /**
   * @return JsonResponse
   */
  public function listWorkflowSteps();

  /**
   * @param string $userName
   * @param string $password
   * @return JsonResponse
   */
  public function login($userName, $password);

  /**
   * @param string $userName
   * @return JsonResponse
   */
  public function loginOther($userName);

  /**
   * @return JsonResponse
   */
  public function logout();

  /**
   * @return JsonResponse
   */
  public function whoAmI();
}

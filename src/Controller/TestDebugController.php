<?php

namespace Drupal\test_debug\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for test_debug routes.
 */
class TestDebugController extends ControllerBase {

  /**
   * Simple break point.
   */
  public function one() : array {

    $aRandomNumber = rand(0,20);

    $otherRandomNumber = rand(0,20);

    $value = '';
    if ($aRandomNumber === $otherRandomNumber) {
      $value = "They are iguals: $aRandomNumber = $otherRandomNumber";
    }
    else {
      $value = "Oh nooooo.... They are not iguals: $aRandomNumber <> $otherRandomNumber";
    }

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t($value),
    ];

    return $build;

  }

  /**
   * Step Over Vs. Step Into.
   *
   * Use of inline evaluate.
   */
  public function two() : array{

    $firstRandomNumber = $this->getRandomNumber(20);

    $secondRandomNumber = $this->getRandomNumber(20);

    $result = ($firstRandomNumber === $secondRandomNumber) ? "Wow, it matches!!!" : "OH no...";

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t($result),
    ];

    return $build;

  }

  private function getRandomNumber(int $max) : int {
    return rand(0, $max);
  }

}

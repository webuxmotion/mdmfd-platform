<?php

namespace Core\Worker\Template;

use Core\Worker\Config\Config;

class Theme {

  public $theme;
  public static $themeMask;
  protected static $url = '';
  protected static $data = [];

  public function __construct() {
    self::$themeMask = '/%/' . mb_strtolower(ENV) . '/View/themes/%s';

    $this->theme = $this;
  }

  const RULES_NAME_FILE = [
    'header' => 'header-%s',
    'footer' => 'footer-%s',
    'sidebar' => 'sidebar-%s'
  ];

  public static function getUrl() {

      $currentTheme = Config::item('defaultTheme', 'main');
      $baseUrl      = Config::item('baseUrl', 'main');
      
      return sprintf(self::$themeMask, $baseUrl, $currentTheme);
  }

  public static function getData() {
    return static::$data;
  }

  public function setData($data) {
    static::$data = $data;
  }

  public static function title() {
    $nameSite = Setting::get('name_site');
    $description = Setting::get('description');

    echo $nameSite . ' | ' . $description;
  }

  public function header($name = '') {
    $name = (string) $name;
    $file = 'header';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['header'], $name);
    }
    Component::load($file);
  }

  public function footer($name = '') {
    $name = (string) $name;
    $file = 'footer';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
    }
    Component::load($file);
    
  }

  public static function block($name = '', $data = []) {
    
      $name = (string) $name;

      if ($name !== '') {
          Component::load($name, $data);
      }
  }

  public static function getThemePath() {

    $theme = Config::item('defaultTheme');

    if (ENV === 'Site') {
      $theme = Setting::get('active_theme');
    }

    return path('view') . '/themes/' . $theme;
  }
}

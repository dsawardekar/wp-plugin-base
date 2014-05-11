<?php

namespace WpPluginBase;

class PluginMeta {

  protected $file             = null;
  protected $slug             = null;
  protected $dir              = null;
  protected $optionsKey       = null;
  protected $optionsPageTitle = null;
  protected $displayName      = null;
  protected $defaultOptions   = array();

  function __construct($file) {
    $this->file = $file;
  }

  function getFile() {
    return $this->file;
  }

  function getSlug() {
    if (is_null($this->slug)) {
      $this->slug = basename($this->getFile(), '.php');
    }

    return $this->slug;
  }

  function getDir() {
    if (is_null($this->dir)) {
      $this->dir = dirname($this->getFile());
    }

    return $this->dir;
  }

  function getOptionsKey() {
    if (is_null($this->optionsKey)) {
      $this->optionsKey = $this->getSlug() . '-options';
    }

    return $this->optionsKey;
  }

  function getOptionsCapability() {
    return 'manage_options';
  }

  function getDisplayName() {
    if (is_null($this->displayName)) {
      $this->displayName  = str_replace('-', ' ', $this->getSlug());
      $this->displayName  = str_replace('wp', 'WP', $this->displayName);
      $this->displayName  = ucwords($this->displayName);
    }

    return $this->displayName;
  }

  function getOptionsPageTitle() {
    if (is_null($this->optionsPageTitle)) {
      $this->optionsPageTitle .= $this->getDisplayName() . ' | Settings';
    }

    return $this->optionsPageTitle;
  }

  function getOptionsMenuTitle() {
    return $this->getDisplayName();
  }

  function getOptionsPageSlug() {
    return $this->getSlug();
  }

  function getOptionsMenuSlug() {
    return $this->getSlug();
  }

  function getDefaultOptions() {
    return $this->defaultOptions;
  }

  function getOptionsUrl() {
    return admin_url(
      'options-general.php?page=' . $this->getOptionsMenuSlug()
    );
  }

}

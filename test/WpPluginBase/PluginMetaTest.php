<?php

namespace WpPluginBase;

class PluginMetaTest extends \WP_UnitTestCase {

  public $meta;

  function setUp() {
    parent::setUp();

    $this->meta = new PluginMeta(getcwd() . '/my-plugin.php');
  }

  function test_it_store_path_to_main_plugin_file() {
    $actual = $this->meta->getFile();
    $this->assertEquals(getcwd() . '/my-plugin.php', $actual);
  }

  function test_it_can_build_slug_from_file_name() {
    $actual = $this->meta->getSlug();
    $this->assertEquals('my-plugin', $actual);
  }

  function test_it_stores_directory_of_main_plugin_file() {
    $this->meta = new PluginMeta('foo/my-plugin.php');
    $actual = $this->meta->getDir();
    $this->assertEquals('foo', $actual);
  }

  function test_it_can_build_default_options_key() {
    $actual = $this->meta->getOptionsKey();
    $this->assertEquals('my-plugin-options', $actual);
  }

  function test_it_has_default_options_capability() {
    $actual = $this->meta->getOptionsCapability();
    $this->assertEquals('manage_options', $actual);
  }

  function test_it_has_default_display_name() {
    $actual = $this->meta->getDisplayName();
    $this->assertEquals('My Plugin', $actual);
  }

  function test_it_has_default_options_page_title() {
    $meta = new PluginMeta('wp-my-plugin/wp-my-plugin.php');
    $actual = $meta->getOptionsPageTitle();
    $this->assertEquals('WP My Plugin | Settings', $actual);
  }

  function test_it_has_options_menu_title() {
    $actual = $this->meta->getOptionsMenuTitle();
    $this->assertEquals('My Plugin', $actual);
  }

  function test_it_has_options_page_slug() {
    $actual = $this->meta->getOptionsPageSlug();
    $this->assertEquals('my-plugin', $actual);
  }

  function test_it_has_empty_default_options() {
    $this->assertEquals(array(), $this->meta->getDefaultOptions());
  }

  function test_it_has_default_options_url() {
    $actual = $this->meta->getOptionsUrl();
    $expected = 'options-general.php?page=my-plugin';
    $this->assertStringEndsWith($expected, $actual);
  }

}

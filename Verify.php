<?php

namespace Drupal\Composer\Plugin\AutomaticUpdates\Verify;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PostFileDownloadEvent;

/**
 * Class Verify
 *
 * @package Drupal\Composer\Plugin\AutomaticUpdates\Verify.
 */
class Verify implements PluginInterface, EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public function deactivate(Composer $composer, IOInterface $io): void {}

  /**
   * {@inheritdoc}
   */
  public function uninstall(Composer $composer, IOInterface $io): void {}

  /**
   * {@inheritdoc}
   */
  public function activate(Composer $composer, IOInterface $io): void {}

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      PluginEvents::POST_FILE_DOWNLOAD => 'onPostFileDownload',
    ];
  }

  /**
   * Execute on post file download.
   *
   * @param \Composer\Plugin\PostFileDownloadEvent $event
   *   The post file download event.
   */
  public function onPostFileDownload(PostFileDownloadEvent $event): void {
    throw new \UnexpectedValueException('The checksum verification of the file failed (downloaded from ' . $event->getUrl() . ')');
  }

}

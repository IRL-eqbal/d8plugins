<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\XaiBlock.
 */

namespace Drupal\article\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\NodeInterface;


/**
 * Provides a 'Custom Block Conext' block.
 *
 * @Block(
 *   id = "text_ads",
 *   admin_label = @Translation("Text Ads"),
 *   category = @Translation("Ads"),
 *   context_definitions = {
 *     "node" = @ContextDefinition("entity:node", label = @Translation("Node"))
 *   }
 * )
 */
class ArticleBlockContext extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    //$node = \Drupal::routeMatch()->getParameter('node');
    //$nid = $node->id();
    
    
    $node = $this->getContextValue('node');
    return [
      '#markup' => 'The node id is ' . $node->id(),
    ];
  }
}

<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\XaiBlock.
 */

namespace Drupal\article\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a 'Advance article' block.
 *
 * @Block(
 *   id = "article_block_advanced",
 *   admin_label = @Translation("Article block Advanced"),
 *   category = @Translation("Custom advanced article block example")
 * )
 */
class ArticleAdvancedBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'num_of_articles' => 5
    ];

  }
  /**
   * {@inheritdoc}
   */
  public function build() {
       return array(
      '#type' => 'markup',
      '#markup' => $this->getNodesByEntityQuery($config['num_of_articles']),
    );
  }
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['num_of_articles'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number of articles to display'),
      '#description' => $this->t('Number of articles to display'),
      '#default_value' => $config['num_of_articles'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['num_of_articles'] = $values['num_of_articles'];
  }
  /**
   * Get the nodes from database
   *
   * @param integer $range
   *   Number of items to display
   *
   * @return \Drupal\node\Entity\Node::loadMultiple($nids);
   *  An array of nodes.
   */
  public function getNodesByEntityQuery($range = 5) {
   //Database query and output
   $var = 'Articles to display: ' . $range;
   return $var;
  }
}

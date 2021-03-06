<?php
/**
 * @file
 * Theme function overrides.
 */

/*******************************************************************************
 * Alter Functions
 ******************************************************************************/

function borg_forum_theme_form_comment_node_forum_topic_form_alter(&$form, $form_state) {
  // Hide the weird 'Your name' info.
  $form['author']['_author']['#access'] = FALSE;
}

/*******************************************************************************
 * Preprocess Functions
 ******************************************************************************/

/**
 * Prepares variables for node templates.
 * @see node.tpl.php
 */
function borg_forum_theme_preprocess_node(&$variables) {
  $node = $variables['node']; // Nice shorthand.
  if ($node->changed != $node->created) {
    $updated = format_date($node->changed, 'short');
    $updated_text = t('Updated: !date', array('!date' => $updated));
    $variables['submitted'] .= '&nbsp;---&nbsp;<span class="updated">' . $updated_text . '</span>';
  }
}

/*******************************************************************************
 * Theme function Overrides
 ******************************************************************************/

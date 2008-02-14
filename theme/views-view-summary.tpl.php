<?php
// $Id$
/**
 * @file views-view-summary.tpl.php
 * Default simple view template to display a list of summary lines
 *
 * @ingroup views_templates
 */
?>
<div class="item-list">
  <ul>
  <?php foreach ($rows as $row): ?>
    <li><a href="<?php print $row->url; ?>"><?php print $row->link; ?></a>
    <?php if (!empty($options['count'])): ?>
      (<?php print $row->count?>)
    <?php endif; ?>
  <?php endforeach; ?>
  </ul>
</div>

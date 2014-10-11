<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */


?>

<?php  print $fields['nid']->content ?>

<div class="bien-row clearfix">
  <div class="bien-row-image">
    <?php  print $fields['field_bien_image']->content ?>
  </div>
  <div class="bien-row-content">
     <div class="bien-row-content-header clearfix">
       <div class="bien-row-content-header-ref"><?php  print $fields['field_bien_reference']->content ?></div>
       <h2><?php  print $fields['title']->content ?></h2>
     </div>
     <div class="bien-row-content-content">
      <?php  print $fields['field_bien_puce']->content ?>

      <div class="bien-row-content-resume"><?php  print $fields['field_bien_resume']->content ?></div>
     </div>
     <div class="bien-row-content-footer clearfix">
       <div class="bien-row-content-footer-link"><?php  print $fields['view_node']->content ?></div>
       <div class="bien-row-content-footer-prix"><?php  print $fields['field_bien_prix']->content ?></div>
     </div>
  </div>
</div>
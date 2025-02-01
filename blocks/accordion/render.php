<div class="block-accordion border p-4">
  <div class="text-xs"><em><?php echo $block->name; ?></em></div>

  <div class="js-accordion accordion">
    <?php foreach ($attributes['items'] as $key => $item) : ?>
      <div class="accordion-item border">
        <div class="js-accordion-trigger accordion-trigger p-4">
          <?php echo $item['title']; ?>
        </div>
        <div class="accordion-panel max-h-0 overflow-hidden">
          <div class="px-4 pb-4">
            <?php echo $item['content']; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
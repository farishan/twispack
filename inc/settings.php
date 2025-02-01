<?php

/**
 * Custom General Settings
 */
function custom_general_settings()
{
  // Register settings
  register_setting('general', 'logo_dark', [
    'type'              => 'string',
    'sanitize_callback' => 'esc_url',
    'default'           => '',
  ]);
  register_setting('general', 'logo_light', [
    'type'              => 'string',
    'sanitize_callback' => 'esc_url',
    'default'           => '',
  ]);

  // Add fields
  add_settings_field(
    'logo_dark',
    'Logo - Dark',
    'custom_logo_field_callback',
    'general',
    'default',
    ['option_name' => 'logo_dark']
  );

  add_settings_field(
    'logo_light',
    'Logo - Light',
    'custom_logo_field_callback',
    'general',
    'default',
    ['option_name' => 'logo_light']
  );
}
add_action('admin_init', 'custom_general_settings');

function custom_logo_field_callback($args)
{
  $option_name = $args['option_name'];
  $value = get_option($option_name);
?>
  <?php if (current_user_can('upload_files')) : ?>
    <div class="hide-if-no-js"
      x-data="{
        value: '<?php echo esc_url($value); ?>',
        openMediaUploader() {
          let mediaUploader = wp.media({
            title: 'Choose Logo',
            button: { text: 'Use this logo' },
            multiple: false
          });

          mediaUploader.on('select', () => {
            let attachment = mediaUploader.state().get('selection').first().toJSON();
            this.value = attachment.url;
          });

          mediaUploader.open();
        },
        remove() {
          this.value = '';
        }
      }">
      <template x-if="value">
        <div>
          <img :src="value" style="max-height: 50px; display:block; margin-top: 10px;">
          <br>
        </div>
      </template>

      <button type="button" class="button" @click="openMediaUploader()">Choose image</button>
      <input x-show="value" readonly type="url" name="<?php echo esc_attr($option_name); ?>" x-model="value" class="regular-text">
      <button x-show="value" type="button" class="button" @click="remove()">Remove</button>
    </div>
  <?php endif; ?>
<?php
}

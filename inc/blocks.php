<?php

function twispack_register_blocks()
{
	register_block_type(get_template_directory() . '/blocks/text');
}
add_action('init', 'twispack_register_blocks');

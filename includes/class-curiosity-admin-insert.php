<?php
/**
 * Creates the admin interface to add shortcodes to the editor
 *
 * @package curiosity
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * CURIOSITY_Admin_Insert class
 */
class CURIOSITY_Admin_Insert {

	/**
	 * __construct function
	 *
	 * @access public
	 * @return  void
	 */
	public function __construct() {
		add_action( 'media_buttons', array( $this, 'media_buttons' ), 20 );
		add_action( 'admin_footer', array( $this, 'curiosity_popup_html' ) );
	}

	/**
	 * media_buttons function
	 *
	 * @access public
	 * @return void
	 */
	public function media_buttons( $editor_id = 'content' ) {
		global $pagenow;

		// Only run on add/edit screens
		if ( in_array( $pagenow, array('post.php', 'page.php', 'post-new.php', 'post-edit.php') ) ) {
			$output = '<a href="#TB_inline?width=4000&amp;inlineId=curiosity-choose-shortcode" class="thickbox button curiosity-thicbox" title="' . __( 'Insert Shortcode', 'curiosity' ) . '">' . __( 'Insert Shortcode', 'curiosity' ) . '</a>';
		echo $output;
		}
		
	}

	/**
	 * Build out the input fields for shortcode content
	 * @param  string $key
	 * @param  array $param the parameters of the input
	 * @return void
	 */
	public function curiosity_build_fields($key, $param) {
		$html = '<tr>';
		$html .= '<td class="label">' . $param['label'] . ':</td>';
		switch( $param['type'] )
		{
			case 'text' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<input type="text" class="curiosity-form-text curiosity-input" name="' . $key . '" id="' . $key . '" value="' . $param['std'] . '" />' . "\n";
				$output .= '<span class="curiosity-form-desc">' . $param['desc'] . '</span></td>' . "\n";

				// append
				$html .= $output;

				break;

			case 'textarea' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<textarea rows="10" cols="30" name="' . $key . '" id="' . $key . '" class="curiosity-form-textarea curiosity-input">' . $param['std'] . '</textarea>' . "\n";
				$output .= '<span class="curiosity-form-desc">' . $param['desc'] . '</span></td>' . "\n";

				// append
				$html .= $output;

				break;

			case 'select' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<select name="' . $key . '" id="' . $key . '" class="curiosity-form-select curiosity-input">' . "\n";

				foreach( $param['options'] as $value => $option )
				{
					$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
				}

				$output .= '</select>' . "\n";
				$output .= '<span class="curiosity-form-desc">' . $param['desc'] . '</span></td>' . "\n";

				// append
				$html .= $output;

				break;

			case 'checkbox' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<input type="checkbox" name="' . $key . '" id="' . $key . '" class="curiosity-form-checkbox curiosity-input"' . ( $param['default'] ? 'checked' : '' ) . '>' . "\n";
				$output .= '<span class="curiosity-form-desc">' . $param['desc'] . '</span></td>';

				$html .= $output;

				break;

			default :
				break;
		}
		$html .= '</tr>';

		return $html;
	}

	/**
	 * Popup window
	 *
	 * Print the footer code needed for the Insert Shortcode Popup
	 *
	 * @since 1.0
	 * @global $pagenow
	 * @return void Prints HTML
	 */
	function curiosity_popup_html() {
		global $pagenow;
		include(CURIOSITY_PLUGIN_DIR . 'includes/config.php');

		// Only run in add/edit screens
		if ( in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php' ) ) ) { ?>

			<script type="text/javascript">
				function curiosityInsertShortcode() {
					// Grab input content, build the shortcodes, and insert them
					// into the content editor
					var select = jQuery('#select-curiosity-shortcode').val(),
						type = select.replace('curiosity-', '').replace('-shortcode', ''),
						template = jQuery('#' + select).data('shortcode-template'),
						childTemplate = jQuery('#' + select).data('shortcode-child-template'),
						tables = jQuery('#' + select).find('table').not('.curiosity-clone-template'),
						attributes = '',
						content = '',
						contentToEditor = '';

					// go over each table, build the shortcode content
					for (var i = 0; i < tables.length; i++) {
						var elems = jQuery(tables[i]).find('input, select, textarea');

						// Build an attributes string by mapping over the input
						// fields in a given table.
						attributes = jQuery.map(elems, function(el, index) {
							var $el = jQuery(el);

							console.log(el);

							if( $el.attr('id') === 'content' ) {
								content = $el.val();
								return '';
							} else if( $el.attr('id') === 'last' ) {
								if( $el.is(':checked') ) {
									return $el.attr('id') + '="true"';
								} else {
									return '';
								}
							} else {
								return $el.attr('id') + '="' + $el.val() + '"';
							}
						});
						attributes = attributes.join(' ').trim();

						// Place the attributes and content within the provided
						// shortcode template
						if( childTemplate ) {
							// Run the replace on attributes for columns because the
							// attributes are really the shortcodes
							contentToEditor += childTemplate.replace('{{attributes}}', attributes).replace('{{attributes}}', attributes).replace('{{content}}', content);
						} else {
							// Run the replace on attributes for columns because the
							// attributes are really the shortcodes
							contentToEditor += template.replace('{{attributes}}', attributes).replace('{{attributes}}', attributes).replace('{{content}}', content);
						}
					};

					// Insert built content into the parent template
					if( childTemplate ) {
						contentToEditor = template.replace('{{child_shortcode}}', contentToEditor);
					}

					// Send the shortcode to the content editor and reset the fields
					window.send_to_editor( contentToEditor );
					curiosityResetFields();
				}

				// Set the inputs to empty state
				function curiosityResetFields() {
					jQuery('#curiosity-shortcode-title').text('');
					jQuery('#curiosity-shortcode-wrap').find('input[type=text], select').val('');
					jQuery('#curiosity-shortcode-wrap').find('textarea').text('');
					jQuery('.curiosity-was-cloned').remove();
					jQuery('.curiosity-shortcode-type').hide();
				}

				// Function to redraw the thickbox for new content
				function curiosityResizeTB() {
					var	ajaxCont = jQuery('#TB_ajaxContent'),
						tbWindow = jQuery('#TB_window'),
						curiosityPopup = jQuery('#curiosity-shortcode-wrap');

					ajaxCont.css({
						height: (tbWindow.outerHeight()-47),
						overflow: 'auto', // IMPORTANT
						width: (tbWindow.outerWidth() - 30)
					});
				}

				// Simple function to clone an included template
				function curiosityCloneContent(el) {
					var clone = jQuery(el).find('.curiosity-clone-template').clone().removeClass('hidden curiosity-clone-template').removeAttr('id').addClass('curiosity-was-cloned');

					jQuery(el).append(clone);
				}

				jQuery(document).ready(function($) {
					var $shortcodes = $('.curiosity-shortcode-type').hide(),
						$title = $('#curiosity-shortcode-title');

					// Show the selected shortcode input fields
	                $('#select-curiosity-shortcode').change(function () {
	                	var text = $(this).find('option:selected').text();

	                	$shortcodes.hide();
	                	$title.text(text);
	                    $('#' + $(this).val()).show();
	                    curiosityResizeTB();
	                });

	                // Clone a set of input fields
	                $('.clone-content').on('click', function() {
						var el = $(this).siblings('.curiosity-sortable');

						curiosityCloneContent(el);
						curiosityResizeTB();
						$('.curiosity-sortable').sortable('refresh');
					});

	                // Remove a set of input fields
					$('.curiosity-shortcode-type').on('click', '.curiosity-remove' ,function() {
						$(this).closest('table').remove();
					});

					// Make content sortable using the jQuery UI Sortable method
					$('.curiosity-sortable').sortable({
						items: 'table:not(".hidden")',
						placeholder: 'curiosity-sortable-placeholder'
					});
	            });
			</script>

			<div id="curiosity-choose-shortcode" style="display: none;">
				<div id="curiosity-shortcode-wrap" class="wrap curiosity-shortcode-wrap">
					<div class="curiosity-shortcode-select">    
						<label for="curiosity-shortcode"><?php _e('Select the shortcode type', 'curiosity'); ?></label>
						<select name="curiosity-shortcode" id="select-curiosity-shortcode">
							<option>Select Shortcode</option>
                            <optgroup label="Organizing">
                            <option data-title="Columns" value="curiosity-column-shortcode">Columns</option>
                            <option data-title="Align" value="curiosity-align-shortcode">Align</option>
                            <option data-title="Break" value="curiosity-br-shortcode">Break</option>
                            <option data-title="Clear" value="curiosity-clear-shortcode">Clear</option>
                            <option data-title="Spacer" value="curiosity-spacer-shortcode">Spacer</option>
                            <option data-title="Separator" value="curiosity-separator-shortcode">Separator</option>
                            </optgroup>
                            <optgroup label="Decorations">
                            <option data-title="Dropcap" value="curiosity-dropcap-shortcode">Dropcap</option>
                            <option data-title="Highlight" value="curiosity-highlight-shortcode">Highlight</option>
                            <option data-title="Blockquote" value="curiosity-blockquote-shortcode">Blockquote</option>
                            <option data-title="Button" value="curiosity-button-shortcode">Button</option>
                            <option data-title="Heading" value="curiosity-heading-shortcode">Heading</option>
                            </optgroup>
                            <optgroup label="Content">
                            <option data-title="FlexSlider" value="curiosity-flexslider-shortcode">FlexSlider</option>
                            <option data-title="Map" value="curiosity-map-shortcode">Map</option>
                            <option data-title="Iconbox" value="curiosity-iconbox-shortcode">Iconbox</option>
                            <option data-title="Icon" value="curiosity-icon-shortcode">Icon</option>
                            <option data-title="Contact" value="curiosity-contact-shortcode">Contact</option>
                            <option data-title="Post" value="curiosity-post-shortcode">Post</option>
                            </optgroup>                          
						</select>
					</div>

					<h3 id="curiosity-shortcode-title"></h3>

				<?php

				$html = '';
				$clone_button = array( 'show' => false );

				// Loop through each shortcode building content
				foreach( $curiosity_shortcodes as $key => $shortcode ) {

					// Add shortcode templates to be used when building with JS
					$shortcode_template = ' data-shortcode-template="' . $shortcode['template'] . '"';
					if( array_key_exists('child_shortcode', $shortcode ) ) {
						$shortcode_template .= ' data-shortcode-child-template="' . $shortcode['child_shortcode']['template'] . '"';
					}

					// Individual shortcode 'block'
					$html .= '<div id="' . $shortcode['id'] . '" class="curiosity-shortcode-type" ' . $shortcode_template . '>';

					// If shortcode has children, it can be cloned and is sortable.
					// Add a hidden clone template, and set clone button to be displayed.
					if( array_key_exists('child_shortcode', $shortcode ) ) {
						$html .= (isset($shortcode['child_shortcode']['shortcode']) ? $shortcode['child_shortcode']['shortcode'] : null);
						$shortcode['params'] = $shortcode['child_shortcode']['params'];
						$clone_button['show'] = true;
						$clone_button['text'] = $shortcode['child_shortcode']['clone_button'];
						$html .= '<div class="curiosity-sortable">';
						$html .= '<table id="clone-' . $shortcode['id'] . '" class="hidden curiosity-clone-template"><tbody>';
						foreach( $shortcode['params'] as $key => $param ) {
							$html .= $this->curiosity_build_fields($key, $param);
						}
						if( $clone_button['show'] ) {
							$html .= '<tr><td colspan="2"><a href="#" class="curiosity-remove">' . __('Remove', 'curiosity') . '</a></td></tr>';
						}
						$html .= '</tbody></table>';
					}

					// Build the actual shortcode input fields
					$html .= '<table><tbody>';
					foreach( $shortcode['params'] as $key => $param ) {
						$html .= $this->curiosity_build_fields($key, $param);
					}

					// Add a link to remove a content block
					if( $clone_button['show'] ) {
						$html .= '<tr><td colspan="2"><a href="#" class="curiosity-remove">' . __('Remove', 'curiosity') . '</a></td></tr>';
					}
					$html .= '</tbody></table>';

					// Close out the sortable div and display the clone button as needed
					if( $clone_button['show'] ) {
						$html .= '</div>';
						$html .= '<a id="add-' . $shortcode['id'] . '" href="#" class="button-secondary clone-content">' . $clone_button['text'] . '</a>';
						$clone_button['show'] = false;
					}

					// Display notes if provided
					if( array_key_exists('notes', $shortcode) ) {
						$html .= '<p class="curiosity-notes">' . $shortcode['notes'] . '</p>';
					}
					$html .= '</div>';
				}

				echo $html;
				?>

				<p class="submit">
					<input type="button" id="curiosity-insert-shortcode" class="button-primary" value="<?php _e('Insert Shortcode', 'curiosity'); ?>" onclick="curiosityInsertShortcode();" />
					<a href="#" id="curiosity-cancel-shortcode-insert" class="button-secondary curiosity-cancel-shortcode-insert" onclick="tb_remove();"><?php _e('Cancel', 'curiosity'); ?></a>
				</p>
				</div>
			</div>

		<?php
		}
	}
}

new CURIOSITY_Admin_Insert();
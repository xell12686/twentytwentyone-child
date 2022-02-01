<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class GraphicsRow extends Widget_Base {

    public function get_name() {
        return 'graphics-row';
    }

    public function get_title() {
        return 'Graphics Row';
    }

    public function get_icon() {
        return 'eicon-custom';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Graphic Columns',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'graphic',
            [
                'label' => 'Graphic',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );
		$repeater->add_control(
			'graphic_label',
			[
				'label' => 'Graphic Label',
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [],
				'title_field' => '{{{ graphic_label }}}',
			]
		);


        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
?>
    <div class="widget-graphics">
        <?php if ($settings['list']) : ?>
                <div class="icons">
                    <?php foreach ($settings['list'] as $item) : ?>
                        <div class="item">
                            <div class="box">
                                <?php
                                partial('content/picture', [
                                    'url' => $item['graphic']['url'],
                                    'small' => wp_get_attachment_image_src($item['graphic']['id'], 'medium')[0],
                                    'alt' => $item['graphic']['alt'] ?? 'graphic'
                                ])
                                ?>
                            </div>
                            <h4><?= $item['graphic_label'] ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
    </div>

<?php
    }

	protected function content_template() {
		?>
        <div class="widget-graphics">
            <# if ( settings.list.length ) { #>
                <div class="icons">
                    <# _.each( settings.list, function( item ) { #>
                        <div class="item">
                            <div class="box">
                                <picture>
                                    <img src="{{{ item.graphic.url }}}" alt="graphic" class="">
                                </picture>
                            </div>
                            <h4>{{{ item.graphic_label }}}</h4>
                        </div>
                    <# }); #>
                </div>
            <# } #>
        </div>
		<?php
	}
}

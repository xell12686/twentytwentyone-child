<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Features extends Widget_Base {

    public function get_name() {
        return 'features';
    }

    public function get_title() {
        return 'Features';
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
                'label' => 'Features',
            ]
        );

        $this->add_control(
			'heading',
			[
				'label' => 'Heading',
				'type' => \Elementor\Controls_Manager::TEXT,
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
        
		$repeater->add_control(
			'graphic_description',
			[
				'label' => 'Graphic Description',
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'items',
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
    <section class="features">
        <div class="wrapper">
            <div class="content">
                <h2 class="to-fade"><?= $settings['heading']  ?></h2>
                <?php if ($settings['items']) : ?>
                    <div class="items to-fade">
                        <?php foreach ($settings['items'] as $key => $item) : ?>
                            <div class="item to-fade delay-<?= ++$key?>">
                                <div class="circle">
                                    <?php
                                    partial('content/picture', [
                                        'url' => $item['graphic']['url'],
                                        'small' => wp_get_attachment_image_src($item['graphic']['id'], 'medium')[0],
                                        'alt' => $item['graphic']['alt'] ?? 'feature graphic'
                                    ])
                                    ?>
                                </div>
                                <h4><?= $item['graphic_label'] ?></h4>
                                <div class="description">
                                    <?= $item['graphic_description'] ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
    }

	protected function content_template() {
		?>
        <section class="features">
            <div class="wrapper">
                <div class="content">
                    <h2 class="to-fade">{{{ settings.heading }}}</h2>
                    <# if ( settings.items.length ) { #>
                        <div class="items to-fade">
                            <# _.each( settings.items, function( item ) { #>
                                <div class="item to-fade delay-{{{ item._id }}}">
                                    <div class="circle">
                                        <picture>
                                            <img src="{{{ item.graphic.url }}}" alt="graphic" class="">
                                        </picture>
                                    </div>
                                    <h4>{{{ item.graphic_label }}}</h4>
                                    <div class="description">
                                        {{{ item.graphic_description }}}
                                    </div>
                                </div>
                            <# }); #>
                        </div>
                    <# } #>
                </div>
            </div>
        </section>
		<?php
	}
}

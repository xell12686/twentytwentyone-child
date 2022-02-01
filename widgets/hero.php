<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Hero extends Widget_Base {

    public function get_name() {
        return 'hero';
    }

    public function get_title() {
        return 'Hero';
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
                'label' => 'Hero Content',
            ]
        );

        $this->add_control(
            'hero_background',
            [
                'label' => 'Hero Background',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $this->add_control(
            'brands',
            [
                'label' => 'Add Brand Logos',
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

		$this->add_control(
			'hero_heading',
			[
				'label' => 'Hero Heading',
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);
        $this->add_control(
            'hero_body',
            [
                'label' => 'Hero Body',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
?>
    <section class="hero section-hero">

        <?php
            partial('content/picture', [
                'url' => $settings['hero_background']['url'],
                'medium' => wp_get_attachment_image_src($settings['hero_background']['id'], 'large')[0],
                'small' => wp_get_attachment_image_src($settings['hero_background']['id'], 'medium')[0],
                'alt' => 'Hero background',
                'class' => 'hero-bg'
            ])
        ?>
        <div class="wrapper">
            <div class="content">
                <?php if ($settings['brands']) : ?>
                    <div class="brand-links">
            
                        <?php foreach ($settings['brands'] as $item) : ?>
                            <div>
                                <?php
                                    partial('content/picture', [
                                        'url' => wp_get_attachment_image_src($item['id'], 'medium')[0],
                                        'alt' => 'brand icon'
                                    ])
                                ?>
                            </div>
                        <?php endforeach; ?>
            
                    </div>
                <?php endif; ?>

                <div class="text ">
                    <h1 class="to-fade delay-1"><?= $settings['hero_heading'] ?></h1>
                    <div class="to-fade delay-2"><?= $settings['hero_body'] ?></div>
                </div>
            </div>
                
        </div>

    </section>

<?php
    }

	protected function content_template() {
		?>
            <section class="hero section-hero">

            <picture>
                <img src="{{{ settings.hero_background.url }}}" alt="" class="hero-bg">
            </picture>

            <div class="wrapper">
                <div class="content">
                    <# if ( settings.brands.length ) { #>
                        <div class="brand-links">
                
                            <# _.each( settings.brands, function( item ) { #>
                                <div>
                                    <picture>
                                        <img src="{{{ item.url }}}" alt="brand logo" class="">
                                    </picture>
                                </div>
                            <# }); #>
                
                        </div>
                    <# } #>

                    <div class="text ">
                        <h1 class="">{{{ settings.hero_heading }}}</h1>
                        <div class="">{{{ settings.hero_ }}}</div>
                    </div>
                </div>
                    
            </div>

        </section>
		<?php
	}
}

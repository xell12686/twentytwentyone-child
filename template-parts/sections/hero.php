<section class="hero">
    <?php
    partial('content/picture', [
        'url' => $section['background_image']['url'],
        'medium' => $section['background_image']['sizes']['large'],
        'small' => $section['background_image']['sizes']['medium'],
        'alt' => 'Hero background',
        'class' => 'hero-bg'
    ])
    ?>
    <div class="wrapper">
        <div class="content">
            <?php if ($section['brand_links']) : ?>
                <div class="brand-links">
        
                    <?php foreach ($section['brand_links'] as $item) : ?>
                        <a href="<?= $item['link'] ?>">
                            <?php
                            partial('content/picture', [
                                'url' => $item['image']['sizes']['medium'],
                                'alt' => $item['image']['alt']
                            ])
                            ?>
                        </a>
                    <?php endforeach; ?>
        
                </div>
            <?php endif; ?>

            <div class="text ">
                <h1 class="to-fade delay-1"><?= $section['hero_title'] ?></h1>
                <p class="to-fade delay-2"><?= $section['hero_copy'] ?></p>
            </div>
        </div>
            
    </div>

</section>
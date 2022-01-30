<section class="lead-capture">
    <div class="wrapper">
        <div class="content">
            <div class="text-col to-fade delay-3">
                <h2 class=""><?= $section['title'] ?></h2>
                <div class="copy">
                    <?= $section['copy'] ?>
                </div>
                <?php if ($section['icons']) : ?>
                    <div class="icons">
                        <?php foreach ($section['icons'] as $item) : ?>
                            <div class="item">
                                <div class="box">
                                    <?php
                                    partial('content/picture', [
                                        'url' => $item['image']['url'],
                                        'small' => $item['image']['sizes']['small'],
                                        'alt' => $item['image']['alt']
                                    ])
                                    ?>
                                </div>
                                <h4><?= $item['label'] ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <button class="btn">
                    <span>Yur Conversion rates</span>
                </button>
            </div>
            <div class="form-col">
                <div class="form-box to-fade delay-4">
                    <?= do_shortcode('[contact-form-7 id="47" title="Contact form 1"]') ?>
                </div>
            </div>
        </div>
    </div>
</section>
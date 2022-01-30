<section class="features">
    <div class="wrapper">
        <div class="content">
            <h2 class="to-fade"><?= $section['title']  ?></h2>
            <?php if ($section['columns']) : ?>
                <div class="items to-fade">
                    <?php foreach ($section['columns'] as $key => $item) : ?>
                        <div class="item to-fade delay-<?= ++$key?>">
                            <div class="circle">
                                <?php
                                partial('content/picture', [
                                    'url' => $item['image']['url'],
                                    'small' => $item['image']['sizes']['small'],
                                    'alt' => $item['image']['alt']
                                ])
                                ?>
                            </div>
                            <h4><?= $item['label'] ?></h4>
                            <div class="description">
                                <?= $item['description'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
    $data['large'] = $data['large'] ?? $data['url'] ;
    $data['medium'] = $data['medium'] ?? $data['url'] ;
    $data['small'] = $data['small'] ?? $data['url'] ;
    $data['alt'] = $data['alt'];
    $data['class'] = $data['class'];
?>
<picture>
    <?php if(!empty($data['large'])) { ?>
        <source srcset="<?= $data['large'] ?>" type="image/jpeg" media="(min-width: 1025px)" />
    <?php } ?>
    <?php if(!empty($data['medium'])) { ?>
        <source srcset="<?= $data['medium'] ?>" type="image/jpeg" media="(max-width: 1024px)" />
    <?php } ?>
    <?php if(!empty($data['small'])) { ?>
        <source srcset="<?= $data['small'] ?>" type="image/jpeg" media="(max-width: 640px)" />
    <?php } ?>
    <img src="<?= $data['url'] ?>" alt="<?= $data['alt']?>" class="<?= $data['class']?>" />
</picture>
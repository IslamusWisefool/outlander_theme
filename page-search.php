<?php

/**
 * Page template search.
 *
 * @package Outlander
 */

get_header();

$filters_data = get_filters_data();

?>
<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <outlander-search class="outlander-search row px-4">
            <outlander-filters class="col-lg-3 col-md-3 col-sm-12 pb-4">
                <outlander-clear-all-filters class="clear-all-filters"><button class="btn btn-secondary">Clear All filters</button></outlander-clear-all-filters>
                <?php foreach ($filters_data as $filter_data) : ?>
                    <outlander-checkbox-accordion class="checkbox-accordion" key="<?php echo esc_attr($filter_data['slug'] ?? ''); ?>" label="<?php echo esc_attr($filter_data['label'] ?? ''); ?>">
                        <?php if (!empty($filter_data['label'])) : ?>
                            <div class="checkbox-accordion__handle" role="button">
                                <div class="checkbox-accordion__handle-text"><?php echo esc_html($filter_data['label']); ?></div>
                                <span class="checkbox-accordion__handle-icon"></span>
                            </div>
                        <?php endif; ?>

                        <outlander-checkbox-accordion-content class="checkbox-accordion__content">
                            <?php foreach ($filter_data['children'] as $item) : ?>

                                <?php
                                $has_children      = !empty($item['children']) && is_array($item['children']);
                                $has_content_class = !empty($has_children) ? 'checkbox-accordion__child--has-content' : '';
                                ?>

                                <!--Level One - Children-->
                                <?php if (!empty($item['label'])) : ?>
                                    <outlander-checkbox-accordion-child class="checkbox-accordion__child <?php echo esc_attr($has_content_class); ?>">
                                        <div class="checkbox-accordion__child-handle form-field">
                                            <label data-text="<?php echo esc_attr($item['label']); ?>" class="checkbox">
                                                <input data-text="<?php echo esc_attr($item['label']); ?>" type="checkbox" data-key="<?php echo esc_attr($filter_data['slug'] ?? ''); ?>" value="<?php echo esc_attr($item['value']); ?>" <?php if (!empty($has_children)) : ?> data-has-children="true" <?php endif; ?>>
                                                <span data-text="<?php echo esc_attr($item['label']); ?>" class="checkbox-text"><?php echo wp_kses_post($item['label']); ?></span>
                                            </label>
                                            <?php if (!empty($has_children)) : ?>
                                                <span data-text="<?php echo esc_attr($item['label']); ?>" class="checkbox-accordion__lvl-one-icon checkbox-accordion__child-handle-icon"></span>
                                            <?php endif; ?>
                                        </div>
                                        <!--Level Two - Grand Children-->
                                        <?php if ($has_children) : ?>
                                            <div class="checkbox-accordion__child-content">
                                                <?php foreach ($item['children'] as $child) : ?>
                                                    <?php
                                                    $has_grand_children = !empty($child['children']) && is_array($child['children']);
                                                    ?>
                                                    <?php if (!empty($child['label']) && !empty($child['value'])) : ?>
                                                        <outlander-checkbox-accordion-child class="checkbox-accordion__child">
                                                            <div class="checkbox-accordion__child-handle form-field">
                                                                <label data-text="<?php echo esc_attr($child['label']); ?>" class="checkbox">
                                                                    <input data-key="<?php echo esc_attr($filter_data['slug'] ?? ''); ?>" data-text="<?php echo esc_attr($child['label']); ?>" data-parents="<?php echo esc_attr($item['value']); ?>" <?php if (!empty($has_grand_children)) : ?> data-has-children="true" <?php endif; ?> type="checkbox" value="<?php echo esc_attr($child['value']); ?>">
                                                                    <span data-text="<?php echo esc_attr($child['label']); ?>" class="checkbox-text"><?php echo wp_kses_post($child['label']); ?></span>
                                                                </label>
                                                                <?php if (!empty($has_grand_children)) : ?>
                                                                    <span data-text="<?php echo esc_attr($child['label']); ?>" class="checkbox-accordion__child-handle-icon"></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <!--Level Three Great Grand Children-->
                                                            <?php if (!empty($has_grand_children)) : ?>
                                                                <div class="checkbox-accordion__child-content">
                                                                    <?php foreach ($child['children'] as $grand_children) : ?>
                                                                        <?php
                                                                        $has_great_grand_children = !empty($grand_children['children']) && is_array($grand_children['children']);
                                                                        $has_content_class        = !empty($has_great_grand_children) ? 'checkbox-accordion__child--has-content' : '';
                                                                        ?>
                                                                        <?php if (!empty($grand_children['label']) && !empty($grand_children['value'])) : ?>
                                                                            <outlander-checkbox-accordion-child class="checkbox-accordion__child <?php echo esc_attr($has_content_class); ?>">
                                                                                <div class="checkbox-accordion__child-handle form-field">
                                                                                    <label data-text="<?php echo esc_attr($grand_children['label']); ?>" class="checkbox">
                                                                                        <input data-key="<?php echo esc_attr($filter_data['slug'] ?? ''); ?>" data-text="<?php echo esc_attr($grand_children['label']); ?>" <?php if (!empty($has_great_grand_children)) : ?> data-has-children="true" <?php endif; ?> data-parents="<?php echo esc_attr(sprintf('%1s,%2s', $item['value'], $child['value'])); ?>" type="checkbox" value="<?php echo esc_attr($grand_children['value']); ?>">
                                                                                        <span data-text="<?php echo esc_attr($grand_children['label']); ?>" class="checkbox-text"><?php echo wp_kses_post($grand_children['label']); ?></span>
                                                                                    </label>
                                                                                    <?php if (!empty($has_great_grand_children)) : ?>
                                                                                        <span data-text="<?php echo esc_attr($grand_children['label']); ?>" class="checkbox-accordion__child-handle-icon"></span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                                <?php if (!empty($has_great_grand_children)) : ?>
                                                                                    <div class="checkbox-accordion__child-content">
                                                                                        <?php foreach ($grand_children['children'] as $great_grand_children) : ?>
                                                                                            <?php if (!empty($great_grand_children['label']) && !empty($great_grand_children['value'])) : ?>
                                                                                                <div class="checkbox-accordion__child-handle checkbox-accordion__child-handle--lvl-four form-field">
                                                                                                    <label data-text="<?php echo esc_attr($great_grand_children['label']); ?>" class="checkbox">
                                                                                                        <input data-key="<?php echo esc_attr($filter_data['slug'] ?? ''); ?>" data-text="<?php echo esc_attr($great_grand_children['label']); ?>" data-parents="<?php echo esc_attr(sprintf('%1s,%2s,%3s', $item['value'], $child['value'], $grand_children['value'])); ?>" type="checkbox" value="<?php echo esc_attr($great_grand_children['value']); ?>">
                                                                                                        <span data-text="<?php echo esc_attr($great_grand_children['label']); ?>" class="checkbox-text"><?php echo wp_kses_post($great_grand_children['label']); ?></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; ?>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            </outlander-checkbox-accordion-child>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </outlander-checkbox-accordion-child>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </outlander-checkbox-accordion-child>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </outlander-checkbox-accordion-content>
                    </outlander-checkbox-accordion>
                <?php endforeach; ?>
            </outlander-filters>
            <div class="col-lg-9 col-md-9 col-sm-12 pb-4">
                <outlander-results-count class="outlander-results-count"></outlander-results-count>
                <outlander-results class="row"></outlander-results>
                <outlander-loading-more class="outlander-loading-more"></outlander-loading-more>
            </div>
        </outlander-search>
    </main>
</div>

<?php get_footer(); ?>
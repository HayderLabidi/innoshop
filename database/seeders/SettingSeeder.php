<?php
/**
 * Copyright (c) Since 2024 InnoShop - All Rights Reserved
 *
 * @link       https://www.innoshop.com
 * @author     InnoShop <team@innoshop.com>
 * @license    https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Setting;
use InnoShop\Common\Repositories\SettingRepo;
use Throwable;

class SettingSeeder extends Seeder
{
    /**
     * @return void
     * @throws Throwable
     */
    public function run(): void
    {
        $items = $this->getSettings();
        if ($items) {
            Setting::query()->truncate();
            foreach ($items as $item) {
                SettingRepo::getInstance()->updateSystemValue($item['name'], $item['value']);
            }
        }
    }

    /**
     * @return array[]
     */
    private function getSettings(): array
    {
        return [
            ['space' => 'system', 'name' => 'front_logo', 'value' => 'images/logo.png'],
            ['space' => 'system', 'name' => 'panel_logo', 'value' => 'images/logo-panel.svg'],
            ['space' => 'system', 'name' => 'placeholder', 'value' => 'images/placeholder.png'],
            ['space' => 'system', 'name' => 'favicon', 'value' => 'images/favicon.png'],
            ['space' => 'system', 'name' => 'country_code', 'value' => 'US'],
            ['space' => 'system', 'name' => 'state_code', 'value' => 'CA'],
            ['space' => 'system', 'name' => 'front_locale', 'value' => 'en'],
            ['space' => 'system', 'name' => 'expand', 'value' => '0'],
            ['space' => 'system', 'name' => 'address', 'value' => 'TF Software Park'],
            ['space' => 'system', 'name' => 'telephone', 'value' => '13688886666'],
            ['space' => 'system', 'name' => 'email', 'value' => 'team@innoshop.com'],
            ['space' => 'system', 'name' => 'currency', 'value' => 'usd'],
            ['space' => 'system', 'name' => 'menu_header_categories', 'value' => ['1', '4', '7', '10', '13']],
            ['space' => 'system', 'name' => 'menu_header_pages', 'value' => ['3']],
            ['space' => 'system', 'name' => 'menu_footer_categories', 'value' => ['1', '4', '7']],
            ['space' => 'system', 'name' => 'menu_footer_catalogs', 'value' => ['1', '2']],
            ['space' => 'system', 'name' => 'menu_footer_pages', 'value' => ['1', '2', '3']],
            [
                'space' => 'system',
                'name'  => 'meta_title',
                'value' => [
                    'zh_cn' => 'Ebook',
                    'en'    => 'Bienvenue sur eBook Library, votre destination en ligne pour découvrir, lire et partager des eBooks passionnants dans tous les genres ! Que vous soyez amateur de fiction, de science, de développement personnel ou de classiques de la littérature, notre plateforme propose une vaste collection de livres numériques pour tous les goûts et tous les âges. ',
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'meta_keywords',
                'value' => [
                    'zh_cn' => 'Ebook',
                    'en'    => 'Bienvenue sur eBook Library, votre destination en ligne pour découvrir, lire et partager des eBooks passionnants dans tous les genres ! Que vous soyez amateur de fiction, de science, de développement personnel ou de classiques de la littérature, notre plateforme propose une vaste collection de livres numériques pour tous les goûts et tous les âges. ',
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'meta_description',
                'value' => [
                    'zh_cn' => 'Ebook',
                    'en'    => 'Bienvenue sur eBook Library, votre destination en ligne pour découvrir, lire et partager des eBooks passionnants dans tous les genres ! Que vous soyez amateur de fiction, de science, de développement personnel ou de classiques de la littérature, notre plateforme propose une vaste collection de livres numériques pour tous les goûts et tous les âges. ',
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'slideshow',
                'value' => [
                    [
                        'image' => [
                            'en'    => 'images/demo/banner/banner-1-en.jpg',
                            'zh_cn' => 'images/demo/banner/banner-1-cn.jpg',
                        ],
                        'link' => '/en/category-women-clothing',
                    ],
                    [
                        'image' => [
                            'en'    => 'images/demo/banner/banner-2-en.jpg',
                            'zh_cn' => 'images/demo/banner/banner-2-cn.jpg',
                        ],
                        'link' => '/en/category-women-clothing',
                    ],
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_seo_description',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_seo_keywords',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_seo_title',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_slug',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_summary',
                'value' => '。',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_selling_point',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_seo_description',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_seo_keywords',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_seo_title',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_slug',
                'value' => '',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_summary',
                'value' => '',
            ],
        ];
    }
}

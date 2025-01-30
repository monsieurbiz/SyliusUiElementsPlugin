<?php

/*
 * This file is part of Monsieur Biz' Ui Elements plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusUiElementsPlugin\Form\Type\UiElement;

use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType;
use MonsieurBiz\SyliusRichEditorPlugin\Attribute\AsUiElement;
use MonsieurBiz\SyliusRichEditorPlugin\Attribute\TemplatesUiElement;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\WysiwygType;
use MonsieurBiz\SyliusRichEditorPlugin\WysiwygEditor\EditorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.hero_ui_element',
    icon: 'image outline',
    title: 'monsieurbiz_ui_elements.ui_element.hero_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.hero_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/hero_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/hero_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'hero',
)]
class HeroUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', WysiwygType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.title',
                'required' => false,
                'editor_height' => 120,
                'editor_toolbar_type' => EditorInterface::TOOLBAR_TYPE_CUSTOM,
                'editor_toolbar_buttons' => [
                    ['undo', 'redo'],
                    ['bold', 'underline', 'italic', 'strike'],
                    ['fontColor', 'hiliteColor'],
                    ['removeFormat'],
                    ['link'],
                    ['showBlocks', 'codeView'],
                ],
            ])
            ->add('description', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.description',
                'required' => false,
            ])
            ->add('image', ImageType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.image',
                'required' => false,
            ])
            ->add('mobileImage', ImageType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.mobile_image',
                'required' => false,
            ])
            ->add('buttonLabel', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.button_label',
                'required' => false,
            ])
            ->add('buttonUrl', UrlType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.button_url',
                'required' => false,
            ])
        ;
    }
}

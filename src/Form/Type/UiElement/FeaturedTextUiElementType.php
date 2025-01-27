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

use MonsieurBiz\SyliusRichEditorPlugin\Attribute\AsUiElement;
use MonsieurBiz\SyliusRichEditorPlugin\Attribute\TemplatesUiElement;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\WysiwygType;
use MonsieurBiz\SyliusRichEditorPlugin\WysiwygEditor\EditorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.featured_text_ui_element',
    icon: 'font',
    title: 'monsieurbiz_ui_elements.ui_element.featured_text_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.featured_text_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/featured_text_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/featured_text_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'featured-text',
)]
class FeaturedTextUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', WysiwygType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.content',
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
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
        ;
    }
}

<?php

/*
 * This file is part of Monsieur Biz's SyliusUiElementsPlugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusUiElementsPlugin\Form\Type\UiElement;

use MonsieurBiz\SyliusRichEditorPlugin\Attribute\AsUiElement;
use MonsieurBiz\SyliusRichEditorPlugin\Attribute\TemplatesUiElement;
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\MinimalWysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.header_ui_element',
    icon: 'heading',
    title: 'monsieurbiz_ui_elements.ui_element.header_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.header_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/header_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/header_ui_element.html.twig',
    ),
    wireframe: 'header',
    tags: [],
)]
class HeaderUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('title', MinimalWysiwygType::class, [
            'label' => 'monsieurbiz_ui_elements.common.fields.title',
            'required' => false,
        ]);
        $builder->add('description', MinimalWysiwygType::class, [
            'label' => 'monsieurbiz_ui_elements.common.fields.subtitle',
            'required' => false,
        ]);
    }
}

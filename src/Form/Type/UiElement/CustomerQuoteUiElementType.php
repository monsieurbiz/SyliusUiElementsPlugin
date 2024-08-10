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
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\WysiwygType;
use MonsieurBiz\SyliusRichEditorPlugin\WysiwygEditor\EditorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.customer_quote_ui_element',
    icon: 'quote left',
    title: 'monsieurbiz_ui_elements.ui_element.customer_quote_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.customer_quote_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/customer_quote_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Front/UiElement/customer_quote_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'customer-quote',
)]
class CustomerQuoteUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.title',
                'required' => false,
            ])
            ->add('quote', WysiwygType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.quote',
                'required' => true,
                'editor_height' => 120,
                'editor_toolbar_type' => EditorInterface::TOOLBAR_TYPE_CUSTOM,
                'editor_toolbar_buttons' => [
                    ['undo', 'redo'],
                    ['fontSize', 'formatBlock'],
                    ['bold', 'underline', 'italic', 'strike'],
                    ['fontColor', 'hiliteColor'],
                    ['removeFormat'],
                    ['link'],
                    ['showBlocks', 'codeView'],
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('author', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.author',
                'required' => false,
            ])
            ->add('link', UrlType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.link',
                'required' => true,
                'constraints' => [
                    new Assert\AtLeastOneOf([
                        'includeInternalMessages' => false,
                        'message' => 'monsieurbiz_ui_elements.errors.not_valid_url',
                        'constraints' => [
                            new Assert\Url(['protocols' => ['http', 'https'], 'relativeProtocol' => true]),
                            new Assert\Regex(['pattern' => '`^(#|/[^/])`']),
                        ],
                    ]),
                ],
            ])
            ->add('linkLabel', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.label',
                'required' => true,
            ])
        ;
    }
}

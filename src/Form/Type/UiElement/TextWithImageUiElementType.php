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
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.text_with_image_ui_element',
    icon: 'indent',
    title: 'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/text_with_image_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/text_with_image_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'text-with-image',
)]
class TextWithImageUiElementType extends AbstractType
{
    public const IMAGE_POSITION_LEFT = 'left';

    public const IMAGE_POSITION_RIGHT = 'right';

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', WysiwygType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.content',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('image', ImageType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.image_with_text',
                'required' => false,
            ])
            ->add('imageAlign', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.image_alignment',
                'required' => true,
                'choices' => [
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.fields.image_align.choices.left' => self::IMAGE_POSITION_LEFT,
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.fields.image_align.choices.right' => self::IMAGE_POSITION_RIGHT,
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('firstColumnWidth', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.fields.first_column_width',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([]),
                ],
                'choices' => [
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_1_5' => '1/5',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_1_4' => '1/4',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_1_3' => '1/3',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_2_5' => '2/5',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_1_2' => '1/2',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_3_5' => '3/5',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_2_3' => '2/3',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_3_4' => '3/4',
                    'monsieurbiz_ui_elements.ui_element.text_with_image_ui_element.choices.first_column_width.width_4_5' => '4/5',
                ],
            ])
        ;
    }
}

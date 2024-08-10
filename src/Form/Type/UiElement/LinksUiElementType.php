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
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\LinkType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.links_ui_element',
    icon: 'linkify',
    title: 'monsieurbiz_ui_elements.ui_element.links_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.links_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/links_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Front/UiElement/links_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'links',
)]
class LinksUiElementType extends AbstractType
{
    public const BACKGROUND_LIGHT = 'light';

    public const BACKGROUND_DARK = 'dark';

    public const ALIGNMENT_FULL_WIDTH = 'full_width';

    public const ALIGNMENT_RIGHT = 'right';

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
            ->add('background', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.background',
                'choices' => [
                    'monsieurbiz_ui_elements.ui_element.links_ui_element.fields.background.choices.light' => self::BACKGROUND_LIGHT,
                    'monsieurbiz_ui_elements.ui_element.links_ui_element.fields.background.choices.dark' => self::BACKGROUND_DARK,
                ],
                'row_attr' => [
                    'class' => 'ui segment',
                ],
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('alignment', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.alignment',
                'choices' => [
                    'monsieurbiz_ui_elements.ui_element.links_ui_element.fields.alignment.choices.full_width' => self::ALIGNMENT_FULL_WIDTH,
                    'monsieurbiz_ui_elements.ui_element.links_ui_element.fields.alignment.choices.right' => self::ALIGNMENT_RIGHT,
                ],
                'multiple' => false,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('links', CollectionType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.links',
                'entry_type' => LinkType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'constraints' => [new Assert\Valid()],
                'attr' => [
                    'class' => 'ui secondary segment collection--flex',
                ],
            ])
        ;
    }
}

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
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\UiElement\TitleType;
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\LinkType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'app.links_ui_element',
    icon: 'linkify',
    tags: [],
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
            ->add('title', TitleType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.title',
                'required' => false,
                'attr' => [
                    'class' => 'ui segment',
                ],
            ])
            ->add('background', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.background',
                'choices' => [
                    'app.ui_element.links_ui_element.fields.background.choices.light' => self::BACKGROUND_LIGHT,
                    'app.ui_element.links_ui_element.fields.background.choices.dark' => self::BACKGROUND_DARK,
                ],
                'expanded' => true,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
            ])
            ->add('alignment', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.alignment',
                'choices' => [
                    'app.ui_element.links_ui_element.fields.alignment.choices.full_width' => self::ALIGNMENT_FULL_WIDTH,
                    'app.ui_element.links_ui_element.fields.alignment.choices.right' => self::ALIGNMENT_RIGHT,
                ],
                'expanded' => true,
                'multiple' => false,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
            ])
            ->add('links', CollectionType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.links',
                'entry_type' => LinkType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'constraints' => [new Assert\Valid()],
                'attr' => [
                    'class' => 'ui segment collection--flex',
                ],
            ])
        ;
    }
}

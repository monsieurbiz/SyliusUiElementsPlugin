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
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\ThematicType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.thematics_ui_element',
    icon: 'angle double right',
    title: 'monsieurbiz_ui_elements.ui_element.thematics_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.thematics_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/thematics_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/thematics_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'thematics',
)]
class ThematicsUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.description',
                'required' => false,
            ])
            ->add('thematics', CollectionType::class, [
                'label' => 'monsieurbiz_ui_elements.ui_element.thematics_ui_element.fields.thematics',
                'button_add_label' => 'monsieurbiz_ui_elements.ui_element.thematics_ui_element.buttons.add_element',
                'button_delete_label' => 'monsieurbiz_ui_elements.ui_element.thematics_ui_element.buttons.delete_element',
                'entry_type' => ThematicType::class,
                'prototype_name' => '__thematic__',
                'allow_add' => true,
                'allow_delete' => true,
                'constraints' => [new Assert\Valid()],
                'attr' => [
                    'class' => 'ui segment secondary collection--flex collection--flex-wide',
                ],
            ])
        ;
    }
}

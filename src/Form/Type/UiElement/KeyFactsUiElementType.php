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
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\KeyFactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.key_facts_ui_element',
    icon: 'key',
    title: 'monsieurbiz_ui_elements.ui_element.key_facts_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.key_facts_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/key_facts_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/key_facts_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'key-facts',
)]
class KeyFactsUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('key_facts', CollectionType::class, [
            'label' => 'monsieurbiz_ui_elements.ui_element.key_facts_ui_element.fields.key_facts',
            'button_add_label' => 'monsieurbiz_ui_elements.ui_element.key_facts_ui_element.buttons.add_element',
            'button_delete_label' => 'monsieurbiz_ui_elements.ui_element.key_facts_ui_element.buttons.delete_element',
            'entry_type' => KeyFactType::class,
            'prototype_name' => '__key_fact__',
            'allow_add' => true,
            'allow_delete' => true,
            'constraints' => [new Assert\Valid()],
            'attr' => [
                'class' => 'ui segment secondary collection--flex',
            ],
        ]);
    }
}

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
use MonsieurBiz\SyliusUiElementsPlugin\Form\Type\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.logos_ui_element',
    icon: 'images',
    title: 'monsieurbiz_ui_elements.ui_element.logos_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.logos_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/logos_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/logos_ui_element.html.twig',
    ),
    tags: [],
    wireframe: 'logos',
)]
class LogosUiElementType extends AbstractType
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
            ->add('logos', CollectionType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.logos',
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'constraints' => [new Assert\Valid()],
                'attr' => [
                    'class' => 'ui segment secondary collection--flex',
                ],
            ])
        ;
    }
}

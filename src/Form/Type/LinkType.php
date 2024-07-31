<?php

/*
 * This file is part of Monsieur Biz's SyliusUiElementsPlugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusUiElementsPlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class LinkType extends AbstractType
{
    public const TYPE_INTERNAL = 'internal';

    public const TYPE_EXTERNAL = 'external';

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('link', UrlType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.link',
                'required' => true,
            ])
            ->add('label', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.label',
                'required' => true,
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.type',
                'choices' => [
                    'app.ui_element.links_ui_element.fields.type.choices.internal' => self::TYPE_INTERNAL,
                    'app.ui_element.links_ui_element.fields.type.choices.external' => self::TYPE_EXTERNAL,
                ],
                'expanded' => true,
                'multiple' => false,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
            ])
        ;
    }
}

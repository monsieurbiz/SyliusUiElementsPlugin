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

namespace MonsieurBiz\SyliusUiElementsPlugin\Form\Type;

use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType as MediaManagerImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

final class BadgeType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', MinimalWysiwygType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.title',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('image', MediaManagerImageType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.image',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('link', LinkType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.link',
                'required' => false,
                'with_label' => false,
                'attr' => [
                    'class' => 'ui segment',
                ],
            ])
        ;
    }
}

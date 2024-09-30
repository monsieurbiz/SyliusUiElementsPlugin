<?php

/*
 * This file is part of Monsieur Biz's SyliusUiElementsPlugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusUiElementsPlugin\Form\Type;

use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\UiElement\ImageType as RichEditorImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if (!$options['with_link']) {
            $builder->remove('link');
            $builder->remove('link_type');
        }
        if (!$options['with_alignment']) {
            $builder->remove('align');
        }
        if (!$options['with_title']) {
            $builder->remove('title');
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'with_link' => false,
            'with_alignment' => false,
            'with_title' => false,
            'attr' => [
                'class' => 'ui segment',
            ],
        ]);
        $resolver->setAllowedTypes('with_link', ['null', 'bool']);
        $resolver->setAllowedTypes('with_alignment', ['null', 'bool']);
        $resolver->setAllowedTypes('with_title', ['null', 'bool']);
    }

    public function getParent(): string
    {
        return RichEditorImageType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'monsieurbiz_sylius_ui_elements_image';
    }
}

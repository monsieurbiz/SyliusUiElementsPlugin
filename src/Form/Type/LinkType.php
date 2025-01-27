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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class LinkType extends AbstractType
{
    public const TYPE_INTERNAL = 'internal';

    public const TYPE_EXTERNAL = 'external';

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $linkConstraints = [
            new Assert\AtLeastOneOf([
                'includeInternalMessages' => false,
                'message' => 'monsieurbiz_ui_elements.errors.not_valid_url',
                'constraints' => [
                    new Assert\Url(['protocols' => ['http', 'https'], 'relativeProtocol' => true]),
                    new Assert\Regex(['pattern' => '`^(#|/.*)$`']),
                ],
            ]),
        ];

        if (true === $options['required']) {
            $linkConstraints[] = new Assert\NotBlank();
        }

        $builder
            ->add('link', UrlType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.link',
                'required' => true,
                'constraints' => $linkConstraints,
            ])
            ->add('label', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.label',
                'required' => true,
                'constraints' => $options['required'] ? [new Assert\NotBlank()] : [],
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.link_type',
                'choices' => [
                    'monsieurbiz_ui_elements.ui_element.links_ui_element.fields.type.choices.internal' => self::TYPE_INTERNAL,
                    'monsieurbiz_ui_elements.ui_element.links_ui_element.fields.type.choices.external' => self::TYPE_EXTERNAL,
                ],
                'multiple' => false,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
                'constraints' => $options['required'] ? [new Assert\NotBlank()] : [],
            ])
        ;

        if (false === $options['with_label']) {
            $builder->remove('label');
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'with_label' => true,
        ]);
        $resolver->setAllowedTypes('with_label', ['bool']);
    }
}

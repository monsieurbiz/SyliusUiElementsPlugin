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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class FigureType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('figure', TextType::class, [
                'required' => true,
                'label' => 'monsieurbiz_ui_elements.ui_element.figures_ui_element.fields.figure',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('description', TextType::class, [
                'required' => false,
                'label' => 'monsieurbiz_ui_elements.common.fields.description',
            ])
        ;
    }
}

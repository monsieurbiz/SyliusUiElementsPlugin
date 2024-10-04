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
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'monsieurbiz_ui_elements.job_offer_ui_element',
    icon: 'clipboard',
    title: 'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.title',
    description: 'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.description',
    templates: new TemplatesUiElement(
        adminRender: '@MonsieurBizSyliusUiElementsPlugin/Admin/UiElement/job_offer_ui_element.html.twig',
        frontRender: '@MonsieurBizSyliusUiElementsPlugin/Shop/UiElement/job_offer_ui_element.html.twig',
    ),
    wireframe: '',
)]
final class JobOfferUiElementType extends AbstractType
{
    public const DISPLAY_SYNTHESIS = 'synthesis';

    public const DISPLAY_COMPLETE = 'complete';

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('display', ChoiceType::class, [
                'label' => 'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.fields.display',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
                'choices' => [
                    'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.choices.display.synthesis' => self::DISPLAY_SYNTHESIS,
                    'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.fields.display.complete' => self::DISPLAY_COMPLETE,
                ],
            ])
            ->add('title', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.title',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('contract', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.fields.contract',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('localisation', TextType::class, [
                'label' => 'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.fields.localisation',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('content', WysiwygType::class, [
                'label' => 'monsieurbiz_ui_elements.common.fields.content',
                'required' => false,
            ])
            ->add('url', UrlType::class, [
                'label' => 'monsieurbiz_ui_elements.ui_element.job_offer_ui_element.fields.url',
                'required' => false,
            ])
        ;
    }
}

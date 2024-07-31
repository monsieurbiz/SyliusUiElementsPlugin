<?php

/*
 * This file is part of a proprietary project.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Form\Type\UiElement;

use MonsieurBiz\SyliusRichEditorPlugin\Attribute\AsUiElement;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\WysiwygType;
use MonsieurBiz\SyliusRichEditorPlugin\WysiwygEditor\EditorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

#[AsUiElement(
    code: 'app.hero_ui_element',
    icon: 'image outline',
    tags: [],
)]
class HeroUiElementType extends AbstractType
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', WysiwygType::class, [
                'label' => 'app.ui_element.hero_ui_element.fields.title',
                'required' => false,
                'editor_height' => 120,
                'editor_toolbar_type' => EditorInterface::TOOLBAR_TYPE_CUSTOM,
                'editor_toolbar_buttons' => [
                    ['undo', 'redo'],
                    ['bold', 'underline', 'italic', 'strike'],
                    ['fontColor', 'hiliteColor'],
                    ['removeFormat'],
                    ['link'],
                    ['showBlocks', 'codeView'],
                ],
            ])
            ->add('subtitle', null, [
                'label' => 'app.ui_element.hero_ui_element.fields.subtitle',
                'required' => false,
            ])
            ->add('description', null, [
                'label' => 'app.ui_element.hero_ui_element.fields.description',
                'required' => false,
            ])
        ;
    }
}

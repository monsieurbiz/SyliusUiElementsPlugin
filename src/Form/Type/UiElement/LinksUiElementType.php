<?php
declare(strict_types=1);

namespace App\Form\Type\UiElement;

use App\Form\LinkType;
use App\Form\TitleWithDot;
use MonsieurBiz\SyliusRichEditorPlugin\Attribute\AsUiElement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[AsUiElement(
    code: 'app.links_ui_element',
    icon: 'linkify',
    tags: [],
)]
class LinksUiElementType extends AbstractType
{
    public const BACKGROUND_LIGHT = 'light';
    public const BACKGROUND_DARK = 'dark';
    public const ALIGNMENT_FULL_WIDTH = 'full_width';
    public const ALIGNMENT_RIGHT = 'right';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TitleWithDot::class, [
                'label' => 'app.ui_element.links_ui_element.fields.title',
                'required' => false,
                'attr' => [
                    'class' => 'ui segment',
                ],
            ])
            ->add('background', ChoiceType::class, [
                'label' => 'app.ui_element.links_ui_element.fields.background.label',
                'choices' => [
                    'app.ui_element.links_ui_element.fields.background.choices.light' => self::BACKGROUND_LIGHT,
                    'app.ui_element.links_ui_element.fields.background.choices.dark' => self::BACKGROUND_DARK,
                ],
                'expanded' => true,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
            ])
            ->add('alignment', ChoiceType::class, [
                'label' => 'app.ui_element.links_ui_element.fields.alignment.label',
                'choices' => [
                    'app.ui_element.links_ui_element.fields.alignment.choices.full_width' => self::ALIGNMENT_FULL_WIDTH,
                    'app.ui_element.links_ui_element.fields.alignment.choices.right' => self::ALIGNMENT_RIGHT,
                ],
                'expanded' => true,
                'multiple' => false,
                'row_attr' => [
                    'class' => 'ui segment',
                ],
            ])
            ->add('links', CollectionType::class, [
                'label' => 'app.ui_element.links_ui_element.fields.links',
                'entry_type' => LinkType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'constraints' => [new Assert\Valid()],
                'attr' => [
                    'class' => 'ui segment collection--flex',
                ],
            ])
        ;
    }
}

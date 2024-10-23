<h1 align="center">Sylius Ui Elements for Rich Editor</h1>


[![Ui Elements Plugin license](https://img.shields.io/github/license/monsieurbiz/SyliusUiElementsPlugin?public)](https://github.com/monsieurbiz/SyliusUiElementsPlugin/blob/master/LICENSE)
[![Tests Status](https://img.shields.io/github/actions/workflow/status/monsieurbiz/SyliusUiElementsPlugin/tests.yaml?branch=master&logo=github)](https://github.com/monsieurbiz/SyliusUiElementsPlugin/actions?query=workflow%3ATests)
[![Recipe Status](https://img.shields.io/github/actions/workflow/status/monsieurbiz/SyliusUiElementsPlugin/recipe.yaml?branch=master&label=recipes&logo=github)](https://github.com/monsieurbiz/SyliusUiElementsPlugin/actions?query=workflow%3ASecurity)
[![Security Status](https://img.shields.io/github/actions/workflow/status/monsieurbiz/SyliusUiElementsPlugin/security.yaml?branch=master&label=security&logo=github)](https://github.com/monsieurbiz/SyliusUiElementsPlugin/actions?query=workflow%3ASecurity)

Library of UiElements for [RichEditor](https://github.com/monsieurbiz/SyliusRichEditorPlugin)

## Compatibility

| Sylius Version | PHP Version |
|---|---|
| 1.12 | 8.2 |
| 1.13 | 8.2 |

## Installation

If you want to use our recipes, you can configure your composer.json by running:

```bash
composer config --no-plugins --json extra.symfony.endpoint '["https://api.github.com/repos/monsieurbiz/symfony-recipes/contents/index.json?ref=flex/master","flex://defaults"]'
```

```bash
composer require monsieurbiz/sylius-ui-elements-plugin
```

Et voilà! 🎉

Now, you have access to a set of UiElements for RichEditor.

## Wireframes

They are copied while playing the recipe.

If you want to copy them manually, you can run:

```bash
mkdir -p templates/bundles/MonsieurBizSyliusRichEditorPlugin/Wireframe/;
cp -R vendor/monsieurbiz/sylius-ui-elements-plugin/src/Resources/views/Wireframe/* templates/bundles/MonsieurBizSyliusRichEditorPlugin/Wireframe/;
```

## License

This plugin is under the MIT license.
Please see the [LICENSE](LICENSE) file for more information.

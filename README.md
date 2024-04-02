# External resources loader &nbsp; [![Latest Stable Version](https://img.shields.io/badge/version-1.0.1-pink)](https://packagist.org/packages/blackbird/external-resources-loader) [![License: MIT](https://img.shields.io/github/license/blackbird-agency/external-resources-loader.svg)](./LICENSE)

This tiny Magento 2 module will allow you to easily lazy load scripts and styles by url.

## Installation

```bash
composer require blackbird/external-resources-loader
```

```bash
php bin/magento setup:upgrade
```

## Usage

### Load script :

```javascript
blackbird.loadExternalResource('https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js')
	.then(() => /* code which is executed after the lib has loaded */)
```

### Load style :

```javascript
blackbird.loadExternalResource('https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css')
	.then(() => /* code which is executed after the style has loaded */)
```

### Load multiple related scripts and styles :

```javascript
Promise.all([
    blackbird.loadExternalResource('https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js'),
    blackbird.loadExternalResource('https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css')
]).then(() => /* code which is executed after the style and the lib has loaded */)
```

### Troubleshooting

The `loadExternalResource` method will load a script or a style depending on the url extension.
If the url doesn't end by `.js` or `.css`, you could lazy load resource using one of these 2 methods :

- `loadExternalScript` : load resource from a url that provides javascript content
- `loadExternalStyle` : load resource from a url that provides css content

For instance :

```js
blackbird.loadExternalScript("<?= $block->getViewFileUrl('js/my-script') ?>")
```

### Back Office

By default, this tool is only enabled on the frontend, but it can also be used in the back office by activating it here: `Stores > Configuration > Advanced > External Resources Loader`.

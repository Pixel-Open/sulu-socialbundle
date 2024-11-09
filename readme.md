# Sulu social bundle

![GitHub release (with filter)](https://img.shields.io/github/v/release/Pixel-Open/sulu-socialbundle?style=for-the-badge)
[![Dependency](https://img.shields.io/badge/sulu-2.5-cca000.svg?style=for-the-badge)](https://sulu.io/)

## Presentation
A Sulu bundle to easily manage the social medias.

## Requirements

* PHP >= 8.0
* Symfony >= 5.4
* Composer

## Installation

### Install the bundle

Execute the following [composer](https://getcomposer.org/) command to add the bundle to the dependencies of your
project:

```bash
composer require pixeldev/sulu-socialbundle --with-all-dependencies
```

### Enable the bundle

Enable the bundle by adding it to the list of registered bundles in the `config/bundles.php` file of your project:

 ```php
 return [
     /* ... */
     Pixel\SocialBundle\SocialBundle::class => ['all' => true],
 ];
 ```

### Update schema
```shell script
bin/console do:sch:up --force
```

## Bundle Config

Define the Admin Api Route in `routes_admin.yaml`
```yaml
social.settings_api:
  type: rest
  prefix: /admin/api
  resource: pixel_social.settings_route_controller
  name_prefix: social.
```

## Use
## General use
To access the social medias settings, on the administration interface, go to the Settings section and click on "Social medias management".
Once on the form, you will see block content type.

This block is composed of on type, the "Social media" type.
It is made with two fields:
* The social media name
* The social media link

The social media name field is a select in which you can choose the social media you want.

The social media link is a link field type.

Do not forget to click on "Save" to have the information stored and available.

## Twig extension
This bundle comes with several twig function that will help you in rendering the social medias you filled:

**social_settings()**: returns all the social medias you provided. No parameters are required.

Example of use:
```twig
{% set socialSettings = social_settings() %}
<ul class="social-list">
    {% if socialSettings is defined %}
        {% for socialMedia in socialSettings.socialMedias %}
            <li>
                <a href="{{ socialMedia.socialMediaUrl }}" target="_blank">
                    {{ socialMedia.socialMediaName }}
                </a>
            </li>
        {% endfor %}
    {% endif %}
</ul>
```

**facebook_share(link, title)**: returns a link to share on Facebook. It takes two parameters:
* link: the link you want to share
* title: the text that will appear on the shared link on Facebook

Example of use:
```twig
<a {{ facebook_share("https://your-site.com/product/my-product", "My awsome website") }}>Share on Facebook</a>
```

**twitter_share(link, title, origin)**: returns a link to share on Twitter. It takes three parameters:
* link: the link you want to share
* title: the text that will appear on the shared link on Twitter
* origin: the origin of the sharing

Example of use:
```twig
<a href="{{ twitter_share('https://your-site.com/product/my-product', 'My awsome website', 'https://your-site.com') }}>Share on Twitter</a>
```

**linkedin_share(link)**: returns a link to share on LinkedIn. It takes one parameter:
* link: the link you want to share

Example of use:
```twig
<a href="{{ linkedin_share('https://your-site.com/product/my-product') }}>Share on LinkedIn</a>
```

**whatsapp_share(text, link)**: returns a link to share on WhatsApp. It takes two parameters:
* text: the text that will appear on the shared link on WhatsApp
* link: the link you want to share

Example of use:
```twig
<a href="{{ whatsapp_share('https://your-site.com/product/my-product') }}>Share on WhatsApp</a>
```

**pinterest_share(link)**: returns a link to share on Pinterest. It takes one parameter:
* link: the link you want to share

Example of use:
```twig
<a href="{{ pinterest_share('https://your-site.com/product/my-product') }}>Share on Pinterest</a>
```

**social_media_logo(name)**: renders the logo of the specified social media. It takes one parameter:
* name: name of the social media

Example of use:
```twig
{{ social_media_logo(socialMedia.socialMediaName) }}
```

## Contributing
You can contribute to this bundle. The only thing you must do is respect the coding standard we implements.
You can find them in the `ecs.php` file.

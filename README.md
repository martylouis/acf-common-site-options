# ACF Common Site Options

**NOTE: This plugin only works with an installed active version of [Advanced Custom Fields PRO v5](https://www.advancedcustomfields.com/pro/). By itself, this plugin does NOTHING.**

## Example

You can display each field the same way you would display any other option page field:

```php

<p><?php the_field('cso_contact_address_line1', 'option'); ?></p>

```

Read more about the Options Page [here](https://www.advancedcustomfields.com/add-ons/options-page/).

## Fields

#### Contact Info

|Label | Name | Field Type |
|---|---|---|
|Address Line 1|`cso_contact_address_line1`|text|
| Address Line 2 | `cso_contact_address_line2` | text |
| City | `cso_contact_city` | text |
| State (includes all US states options) | `cso_contact_state` | select |
| Zip | `cso_contact_zip` | text |
| Phone Number | `cso_contact_phone` | text |
| Email | `cso_contact_email` | email |
| Social Media Links | `cso_social_links` | repeater |
|  - Social Media Type* | `social_type` | select |
|  - Social Media Url | `social_url` | url |

*Social Media Types include: Facebook, Twitter, Google Plus, LinkedIn, YouTube and Instagram*

![Contact Info Screenshot][contact_info]

#### Code Injection

|Label | Name | Field Type |
|---|---|---|
| Head Code | `cso_code_head` | textarea |
| Footer Code | `cso_code_footer` | textarea |

![Code Injection Screenshot][code_injection]

#### Other Services

|Label | Name | Field Type |
|---|---|---|
| Google Tag Manager Container ID | `cso_gtm_id` | text |
| Google Maps API key | `cso_google_maps_api_key` | text |

![Other Services Screenshot][other_services]

-------
Maintained by [@martylouis](https://twitter.com/martylouis)

[contact_info]: ./images/acf-options-contact-info.png "ACF Common Site Options Contact Info Screenshot"
[code_injection]: ./images/acf-options-code-injection.png "ACF Common Site Options Contact Info Screenshot"
[other_services]: ./images/acf-options-other-services.png "ACF Common Site Options Contact Info Screenshot"

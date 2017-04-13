# Common Site Options for ACF

**NOTE: This plugin only works with an installed active version of [Advanced Custom Fields PRO v5](https://www.advancedcustomfields.com/pro/). By itself, this plugin does NOTHING.**

## Example

You can display each field the same way you would display any other option page field:

```php

<p><?php the_field('cso_contact_address_line1', 'option'); ?></p>

```

Read more about the Options Page [here](https://www.advancedcustomfields.com/add-ons/options-page/).

## Fields

#### Contact Info

|Label | Name | Type | 
|---|---|---|
|Address Line 1|`cso_contact_address_line1`|text|
| Address Line 2 | `cso_contact_address_line2` | text | 
| City | `cso_contact_city` | text |
| State | `cso_contact_state` | select | (w/ all US states) |
| Zip | `cso_contact_zip` | text | 
| Phone Number | `cso_contact_phone` | text |
| Email | `cso_contact_email` | email |
| Social Media Links | `cso_social_links` | repeater |

#### Code Injection

|Label | Name | Type |
|---|---|---|
| Head Code | `cso_code_head` | textarea |
| Footer Code | `cso_code_footer` | textarea |

#### Other Services

|Label | Name | Type | 
|---|---|---|
| Google Analytics ID | `cso_google_analytics_id` | text |
| Google Maps API key | `cso_google_maps_api_key` | text |

------
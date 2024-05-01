# Tel

> Tel is a Statamic addon that formats phone numbers for use in tel: links.

## Features

This modifier will convert a nicely formatted phone number into a numbers-only string, allowing usage inside an href.

It will convert any + symbols into 00 (for international numbers), remove (0) if it exists, and then remove all remaining non-numerical characters.

This modifier will take a phone number and convert it into a numbers-only string so that it can be safely used inside a href.

* Any `+` will be converted to 00 to help identify it as an international number.
* Any `(0)` will be removed as these are purely for humans to understand the non-international number.
* Any spaces, commas, hyphens, or any non-numerical numbers will be removed.

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require netnak/tel
```

## How to Use

Simply add this to the tag that contains your telephone number and apply the `tel` modifier to the tag in the `href`. For example:

```antlers
---
phone_number: +44 (0) 151 123 4567
---

<a href=tel:"{{ phone_number | tel }}">{{ phone_number }}</a>
```

This will output:

```antlers
<a href="tel:00441511234567">+44 (0) 151 123 4567</a>
```
Here’s a polished, ready-to-use README description for your package based on what you provided, with clean formatting and slight improvements for clarity:

---

# Integrate Summernote into Open-Admin

This is an **open-admin** extension that integrates the **Summernote** WYSIWYG editor into the open-admin form system.

---

## Screenshot

![field-summernote](https://user-images.githubusercontent.com/86517067/149800371-a99f23ba-c979-4122-bb7d-2cc32ecd0982.png)

---

## Installation

Run the following command to install the package via Composer:

```bash
composer require amirandev/open-admin-summernote
```

Then publish the package assets:

```bash
php artisan vendor:publish --tag=open-admin-summernote
```

---

## Configuration

In your `config/admin.php` file, add the `summernote` extension configuration under the `extensions` section:

```php
'extensions' => [

    'summernote' => [

        // Set to false to disable this extension
        'enable' => true,

        // Editor configuration options
        'config' => [

            // See Summernote docs for available options
        ],
    ],

],
```

Example configuration (customize as needed):

```php
'config' => [
    'language'    => 'de',
    'height'      => 500,
    'contentsCss' => '/css/frontend-body-content.css',
]
```

For more configuration options, see the official [Summernote Documentation](https://summernote.org/deep-dive/#configuration).

---

## Usage

Use the Summernote editor in your OpenAdmin form like this:

```php
$form->summernote('content');
```

Or with custom options:

```php
$form->summernote('content')->options([
    'lang'        => 'fr',
    'height'      => 500,
    'contentsCss' => '/css/frontend-body-content.css',
]);
```

---

## Troubleshooting

If Summernote does not load or you see errors about missing files, try clearing your application cache:

```bash
php artisan optimize:clear
```

---

## License

This package is licensed under the [MIT License](LICENSE).

---

If you want, I can help you prepare the actual README.md file content ready to copy-paste! Would you like that?

# ASICS Vietnam WordPress Theme

A custom WordPress theme for ASICS Vietnam e-commerce store, featuring a modern design with Tailwind CSS integration.

## Features

- Fully responsive design
- WooCommerce integration
- Customizable through WordPress Customizer
- Vietnamese language support
- Mobile-first approach
- Built with Tailwind CSS
- Font Awesome icons integration
- Google Fonts integration

## Requirements

- WordPress 5.0 or higher
- WooCommerce 6.0 or higher
- PHP 7.4 or higher

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme through the WordPress admin panel
3. Install required plugins:
   - WooCommerce
   - YITH WooCommerce Wishlist
   - Contact Form 7 (optional, for newsletter)

## Customization

The theme can be customized through WordPress Customizer with the following options:

### Header Settings
- Logo upload
- Navigation menu

### Top Banner Settings
- Banner text
- Banner links

### Hero Section Settings
- Hero logo
- Title
- Description
- Button text and URL
- Background image

### Newsletter Settings
- Title
- Description
- Form integration (Contact Form 7)

### Social Media Settings
- Facebook URL
- Instagram URL
- YouTube URL

## WooCommerce Integration

The theme includes custom styling and functionality for:
- Product listings
- Product details
- Shopping cart
- Checkout process
- Wishlist
- Order tracking

## Development

### File Structure
```
asics-vn/
├── inc/
│   ├── customizer.php
│   ├── template-tags.php
│   └── woocommerce.php
├── js/
│   ├── customizer.js
│   └── global.js
├── template-parts/
│   └── content.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── style.css
└── README.md
```

### CSS Framework
The theme uses Tailwind CSS via CDN. For production, it's recommended to:
1. Install Tailwind CSS via npm
2. Configure PostCSS
3. Build and optimize CSS for production

### Customization Tips
1. Edit `functions.php` to add/remove features
2. Modify templates in `template-parts/` for content structure
3. Update `inc/woocommerce.php` for shop customizations
4. Add custom styles to `style.css`

## Support

For support and bug reports, please create an issue in the theme's repository.

## License

This theme is licensed under the GPL v2 or later.

## Credits

- Tailwind CSS
- Font Awesome
- Google Fonts
- WooCommerce

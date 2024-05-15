# WordPress individual posts and pages from internal search results excluder
This code snippet is designed for WordPress site administrators who wish to enhance user experience by excluding specific posts and pages from search results. Particularly useful for hidden or subscriber-only content such as thank you pages after form submissions, this snippet ensures that sensitive or non-public pages remain off the radar from site-wide searches.

##Why Exclude Pages?
The default WordPress behavior includes all posts and pages in search results, which might not suit all websites, especially e-commerce, membership, or educational platforms. Excluding certain pages can prevent unnecessary exposure and focus user interaction where it is most needed.

## Features
- **Ease of Use**: Easily integrate the snippet into your theme's `functions.php` file.
- **Customizable**: Specify which pages or posts to exclude based on IDs or other criteria.
- **Enhanced Privacy**: Ideal for hiding thank you pages, subscriber-exclusive content, or any page that should not be publicly searchable.

## Installation
1. Navigate to the `functions.php` file of your WordPress theme, preferably a child theme to avoid losing changes on theme update.
2. Paste the provided PHP snippet at the end of the file.
3. Customize the snippet as necessary to target the pages or posts you wish to exclude.

## Usage
After installation, the specified pages will automatically be excluded from your site’s search results. No further action is required unless updates to the list of excluded pages are needed.

For more information on managing your site's search functionality, visit [WordPress is_search documentation](https://developer.wordpress.org/reference/functions/is_search/).

## Get Help

- Reach out on [Twitter](https://twitter.com/jcvangent)
- Open an [issue on GitHub](https://github.com/hansvangent/exclude-from-seach-wordpress/issues/new)

## Contribute

#### Issues

For a bug report, bug fix, or a suggestion, please feel free to open an issue.

#### Pull request

Pull requests are always welcome, and I'll do my best to do reviews as quickly as possible.

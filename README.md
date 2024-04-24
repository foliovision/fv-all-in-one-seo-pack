fv-all-in-one-seo-pack
======================

Simple and effective SEO. Non-invasive, elegant. Ideal for client facing projects.

## Testing

* Add new post

  1. Before publishing there will be a warning if you don't have title or meta description filled in

  2. Fill in "Long Title" and "Meta Description" in "FV Simpler SEO" box and publish the post

  3. Post will have only 1 <title> tag and 3 <meta> tags (description, og:description, twitter:description)

  4. <title> will match the "Long Title" and <meta name="description" ... /> will match "Meta Description"

* Go To Settings -> FV Simpler SEO

  1. Check "Add no index checkbox to post editing screen" in "Extra Interface Options"

  2. Go to post editing screen

  3. Check "noindex" checkbox

  4. Post now wont be in wp search results and will have noindex meta tag

* Go To Settings -> FV Simpler SEO

  1. Check "Rewrite Titles" in "Advanced Options"

  2. Go to post page

  3. Page will now have title in format "%post_title% | %blog_title%"

* Go To Settings -> FV Simpler SEO

  This is the default behavior starging with WordPress 6.4:

  1. Setting "Redirect attachment links to the file URLs" is checked by default

  2. Go to wp-admin -> Media

  3. Click one of the image

  4. Check the "View media file", it should be something like: https://site.com/{image slug}

  5. Clicking it should open the image file and not show a WordPress page with the image on it
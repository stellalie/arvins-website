## Description
Built this website for Arvin (arvz.me) show he can showcase his skilzzzz

## Running Locally

```
php composer.phar update
php -S localhost:8000
```

## Generate Static HTML for S3 Hosting (Save $$$$)
1. Run the site locally, and go to the website in localhost, ie. `localhost:8000`
2. Right click to view source and save the content as `index.html` at `public/index.html`
3. Now you can upload the whole `public` (except the index.php file) folder to S3
using either the s3 console ui or aws cli

```
aws configure
aws s3 sync public/ s3://site-arvin-personal/ --acl bucket-owner-full-control --acl public-read
```
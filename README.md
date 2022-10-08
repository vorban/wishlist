# wishlist

A wishlist page. Uses B64 encoded JSON in query parameters to display any wishlist.

## Usage
```sh
node encoder.js path/to/wishlist.json
```

Then go to `http://the.page.url/?wishlist=b64_of_wishlist`.

## Format of wishlist.json
```json
{
    "sites": [
        {
            "name": "anysite",
            "url": "https://baseurl.of.productpage",
            "imgurl": "https://baseurl.of.images",
            "img": "https://logo.or.favicon"
        },
    ],
    "items": [
        {
            "name": "productname",
            "img": "imageurl/without_the_base",
            "url": "producturl/without_the_base",
            "site": "anysite",
            "cost": 19.99
        },
    ]
}
```

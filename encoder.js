const fs = require('fs')

function utf8_to_b64(str) {
  return btoa(unescape(encodeURIComponent(str)));
}

let filename = process.argv[2]
let wishlist = fs.readFileSync(filename, { encoding: 'utf-8' });
wishlist = JSON.stringify(JSON.parse(wishlist))


console.log(utf8_to_b64(wishlist))

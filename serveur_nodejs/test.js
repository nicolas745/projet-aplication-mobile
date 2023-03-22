crypto = require('crypto');
key = "f7d6a14b9bbe67750ddae579a8ee0136071159e2f80da6e09ead3ecc3795405e";
cb = "MEE9PQ==::dLwEyUxGEJYF/s+M::BbVJzpQOXIMKYX+ZDuOC+g==";
function decrypt(ciphertext, key) {

    const parts = ciphertext.split('::');
    const encryptedData = Buffer.from(parts[0], 'base64');
    const iv = Buffer.from(parts[1], 'base64');
    const tag = Buffer.from(parts[2], 'base64');
    const decipher = crypto.createDecipheriv('aes-256-gcm', key, iv);
    decipher.setAuthTag(tag);

    let decrypted = decipher.update(encryptedData, null, 'utf8');
    decrypted += decipher.final('utf8');

    return decrypted;
}
decrypt(cb, key);
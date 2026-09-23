const { Jimp, intToRGBA, rgbaToInt } = require('jimp');

async function main() {
    const image = await Jimp.read('public/assets/images/logo_sunrise.jpg');
    
    // Crop the bottom 40% to remove text
    const w = image.bitmap.width;
    const h = image.bitmap.height;
    image.crop({ x: 0, y: 0, w, h: Math.floor(h * 0.65) });
    
    // Make background transparent
    image.scan(0, 0, image.bitmap.width, image.bitmap.height, function (x, y, idx) {
        const r = this.bitmap.data[idx + 0];
        const g = this.bitmap.data[idx + 1];
        const b = this.bitmap.data[idx + 2];
        
        // If the pixel is very close to white, make it transparent
        if (r > 240 && g > 240 && b > 240) {
            this.bitmap.data[idx + 3] = 0; // Alpha
        }
    });
    
    // Autocrop the transparent edges!
    image.autocrop();
    
    await image.write('public/assets/images/logo_sunrise-transparent.png');
    console.log("Successfully created transparent and cropped logo");
}

main().catch(e => console.log(e.stack || e));

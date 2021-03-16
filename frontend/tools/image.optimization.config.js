module.exports = {
    makeWebp: false, // option to make or not to make .webp images during the process of optimization
    src: './frontend/assets/images/', // src folder. Must exist
    dest: './frontend/static/images/', // destination folder. Must exist
    webpQuality: 80, // webp quality in percents
    jpegQuality: 90, // jpg quality in percents
    logLevel: 'verbose', //
};

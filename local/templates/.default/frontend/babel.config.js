const presets = [
    [
        "@babel/preset-env",
        {
            targets: {
                "ie": "11"
            }
        },
    ],
    "minify"
];

module.exports = { presets };
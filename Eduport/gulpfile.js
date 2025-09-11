'use strict';
const {series, src, dest, parallel, watch} = require("gulp");
const autoprefixer = require("gulp-autoprefixer");
const CleanCSS = require("gulp-clean-css");
const rename = require("gulp-rename");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));
const npmdist = require("gulp-npm-dist");
const rtlcss = require("gulp-rtlcss");

const paths = {
    baseDistAssets: "src/assets/",  // build assets directory
    baseSrcAssets: "src/assets/",   // source assets directory
};

const plugins = function () {

    const out = paths.baseDistAssets + "vendor/";
    return src(npmdist(), {base: "./node_modules"})
        .pipe(rename(function (path) {
            path.dirname = path.dirname.replace(/\/dist/, '').replace(/\\dist/, '');
        }))
        .pipe(dest(out));
};

const scss = function () {
    const out = paths.baseDistAssets + "css/";

    src(paths.baseSrcAssets + "scss/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError)) // scss to css
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 2 versions"],
            })
        )
        .pipe(dest(out))
        .pipe(CleanCSS())
        .pipe(rename({suffix: ".min"}))
        .pipe(sourcemaps.write("./"))
        .pipe(dest(out));

    // generate rtl
    return src(paths.baseSrcAssets + "scss/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError)) // scss to css
        .pipe(  
            autoprefixer({
                overrideBrowserslist: ["last 2 versions"],
            })
        )
        .pipe(rtlcss())
        .pipe(rename({suffix: "-rtl"}))
        .pipe(dest(out))
        .pipe(CleanCSS())
        .pipe(rename({suffix: ".min"}))
        .pipe(sourcemaps.write("./"))
        .pipe(dest(out));
};


// File Watch Task
function watchFiles() {
    watch([paths.baseSrcAssets + "scss/**/*.scss", "!"], series(scss));
}

// Production Tasks
exports.default = series(
    parallel(plugins, scss),
    parallel(watchFiles)
);

// Build Tasks
exports.build = series(
    plugins,
    parallel(scss)
);
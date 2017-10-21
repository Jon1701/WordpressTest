const webpack = require('webpack');
const path = require('path');

// Source and destination folders.
const srcPath = path.join(__dirname, 'src', 'js');
const destPath = path.join(__dirname, 'hyperion');

module.exports = {
  target: 'node',
  entry: {
    dashboard: path.join(srcPath, 'dashboard', 'index.js'),
    'edit-post': path.join(srcPath, 'edit-post', 'index.js'),
  },
  output: {
    path: path.join(destPath, 'js'),
    filename: '[name].js',
  },
  resolve: {
    extensions: ['.js'],
  },
  module: {
    rules: [
      {
        test: /\.js$/i,
        exclude: /node_modules/,
        use: 'babel-loader',
      }
    ],
  },
}

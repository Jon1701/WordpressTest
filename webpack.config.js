const webpack = require('webpack');
const path = require('path');

// Source and destination folders.
const srcPath = path.join(__dirname, 'containers');
const destPath = path.join(__dirname, 'hyperion');

module.exports = {
  entry: {
    HyperionEditPost: path.join(srcPath, 'EditPost', 'index'),
  },
  output: {
    path: path.join(destPath, 'js'),
    filename: '[name].js',
  },
  resolve: {
    extensions: ['.js', '.jsx'],
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/i,
        exclude: [/node_modules/],
        use: 'babel-loader',
      }
    ],
  },
}

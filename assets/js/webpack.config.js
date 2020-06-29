const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: './src/index.js',
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader"
          }
        },
        {
          test: /\.svg$/,
          use: [
            {
              loader: 'babel-loader',
            },
            {
              loader: 'react-svg-loader',
              options: {
                svgo: {
                  plugins: [{ removeTitle: false }],
                  floatPrecision: 2
                },
                jsx: true
              }
            }
          ]
        },
        {
          test: /\.css$/,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader'
          ],
          exclude: /\.module\.css$/
        }
      ]
    },
    output: {
        path: __dirname + '/build',
        publicPath: '/',
        filename: 'index.js'
    },
    plugins: [
        new MiniCssExtractPlugin(),
    ],
  };

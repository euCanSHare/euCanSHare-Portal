const path = require('path');

module.exports = {
  entry: {
    leadin: './src/app.js',
    gutenberg: './src/gutenberg/gutenberg.js',
    feedback: './src/feedback/feedback.js',
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist'),
    library: ['wp', '[name]'],
    libraryTarget: 'window',
  },
  externals: [
    {
      jquery: 'jQuery',
      lodash: 'lodash',
      react: 'React',
      'react-dom': 'ReactDOM',
    },
    function wp(context, request, callback) {
      if (/^@wordpress\//.test(request)) {
        const arr = request.split('/');
        arr[0] = 'wp';
        return callback(null, `var ${arr.join('.')}`);
      }
      return callback();
    },
  ],
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
        query: {
          presets: ['@babel/preset-env'],
          plugins: ['transform-class-properties', 'transform-react-jsx'],
        },
      },
    ],
  },
  devtool: 'source-map',
};

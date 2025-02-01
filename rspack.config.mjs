export default {
  experiments: {
    css: true,
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: 'postcss-loader',
        type: 'css',
      },
    ],
  },
  // resolve: {
  //   extensions: ['.css']
  // }
};

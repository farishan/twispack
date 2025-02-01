/* Always check `./dist/index.js` after import something new here. */
import metadata from './block.json'

document.addEventListener('DOMContentLoaded', () => {
  // Get helper functions from global scope
  const { registerBlockType } = window.wp.blocks;
  const { __ } = window.wp.i18n;
  const { useBlockProps } = window.wp.blockEditor;
  const { TextControl, Card, CardHeader, CardBody } = window.wp.components;

  registerBlockType(
    metadata.name,
    {
      // Dashicons Options – https://goo.gl/aTM1DQ
      // icon: 'wordpress-alt',

      edit: (props) => {
        return (
          <div {...useBlockProps()}>
            <Card>
              <CardHeader>
                <div style={{
                  fontSize: `12px`,
                  lineHeight: `100%`
                }}><em>Block: {metadata.name}</em></div>
              </CardHeader>
              <CardBody>
                <TextControl
                  __nextHasNoMarginBottom
                  label={__(
                    metadata.title,
                    metadata.textdomain
                  )}
                  value={props.attributes.text || ''}
                  onChange={(value) => props.setAttributes({ text: value })}
                />
              </CardBody>
            </Card>
          </div>
        )
      },
      save: function (props) {
        return <div>{props.attributes.text}</div>
      }
    },
  );
})

/* Always check `./dist/index.js` after importing something new here. */
import BlockTitle from '../_components/BlockTitle';
import metadata from './block.json';
import VStack from './VStack';

document.addEventListener('DOMContentLoaded', () => {
  // Get helper functions from global scope
  const { registerBlockType } = window.wp.blocks;
  const { __ } = window.wp.i18n;
  const { useBlockProps } = window.wp.blockEditor;
  const {
    TextControl,
    Button,
    Card,
    CardHeader,
    CardBody,
    CardFooter,
  } = window.wp.components;

  registerBlockType(metadata.name, {
    edit: (props) => {
      const { attributes, setAttributes } = props;
      const { items = [] } = attributes;

      // Function to update an item
      const updateItem = (index, key, value) => {
        const newItems = [...items];
        newItems[index] = { ...newItems[index], [key]: value };
        setAttributes({ items: newItems });
      };

      // Function to add a new accordion item
      const addItem = () => {
        setAttributes({
          items: [...items, { title: 'New Accordion', content: '' }]
        });
      };

      // Function to remove an item
      const removeItem = (index) => {
        setAttributes({ items: items.filter((_, i) => i !== index) });
      };

      return (
        <div {...useBlockProps()}>
          <Card>
            <CardHeader>
              <BlockTitle name={metadata.name} />
            </CardHeader>
            <CardBody>
              <VStack>
                {items.map((item, index) => (
                  <Card key={index}>
                    <CardBody>
                      <VStack>
                        <div>
                          <TextControl
                            __nextHasNoMarginBottom
                            label={__('Title', 'twispack')}
                            value={item.title}
                            onChange={(value) => updateItem(index, 'title', value)}
                          />
                        </div>
                        <div>
                          <TextControl
                            __nextHasNoMarginBottom
                            label={__('Content', 'twispack')}
                            value={item.content}
                            onChange={(value) => updateItem(index, 'content', value)}
                          />
                        </div>
                        <Button
                          isDestructive
                          variant="secondary"
                          onClick={() => removeItem(index)}
                          style={{ marginBottom: '10px' }}
                        >
                          {__('Remove', 'twispack')}
                        </Button>
                      </VStack>
                    </CardBody>
                  </Card>
                ))}
              </VStack>
            </CardBody>
            <CardFooter>
              <Button isPrimary onClick={addItem}>
                {__('Add Accordion Item', 'twispack')}
              </Button>
            </CardFooter>
          </Card>
        </div>
      );
    },

    save: (props) => {
      const { attributes } = props;
      const { items = [] } = attributes;

      return (
        <div {...useBlockProps.save()}>
          {items.map((item, index) => (
            <div key={index} className="accordion-item">
              <button className="accordion-title">{item.title}</button>
              <div className={`accordion-content`}>
                {item.content}
              </div>
            </div>
          ))}
        </div>
      );
    }
  });
});

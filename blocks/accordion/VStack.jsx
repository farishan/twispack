export default function VStack({ children }) {
  return (
    <div className="vstack">
      {React.Children.map(children, (child, index) => {
        if (index === 0) {
          return child;
        }
        return React.cloneElement(child, {
          style: { ...child.props.style, marginTop: '1rem' },
        });
      })}
    </div>
  );
}

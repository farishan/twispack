export default function BlockTitle({ name }) {
  return <>
    <div style={{
      fontSize: `12px`,
      lineHeight: `100%`
    }}><em>Block: {name}</em></div>
  </>
}
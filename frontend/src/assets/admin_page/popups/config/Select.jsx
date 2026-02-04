export default function Select({ name, value, onChange, options=[], lang }) {
  return (
    <select className="width_3" 
        name={name} 
        value={value} 
        onChange={onChange}
        disabled={!options.length}
    >
      {options.map(opt => (
        <option key={opt.value} value={opt.value}>
          {opt[lang]}
        </option>
      ))}
    </select>
  );
}
import { tableHeaders } from './tableHeaders';

export function TableHeader({ lang, competitionName }) {
  return (
    <thead>
      <tr style={{ position: 'sticky', top: '30px', zIndex: 9 }}>
        <th style={{ display: 'none' }}></th>
        <th style={{ position: 'sticky', width: '1230px', minWidth: '230px', left: '0px', zIndex: 6 }}></th>
        <th style={{  position: 'sticky', left: '37px',  top: '30px', zIndex: 6, textAlign: 'left' }} colSpan={tableHeaders.length}>
          <b>{competitionName}</b>
        </th>
      </tr>
      <tr>
        {tableHeaders.map(col => (
          <th
            key={col.key}
            style={{
              width: col.width,
              display: col.hidden ? 'none' : undefined,
              position: col.sticky ? 'sticky' : 'static',
              left: col.left ?? undefined,
            }}
          >
            {col.labels[lang]}
          </th>
        ))}
      </tr>
    </thead>
  );
}
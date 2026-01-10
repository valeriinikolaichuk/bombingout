import { useEffect, useState } from 'react';

export default function About({lang}) {
  const [data, setData] = useState(null);

  useEffect(() => {
    let active = true;

    import(`./texts/about.${lang}.json`)
      .then(m => {
        if (active) setData(m.default);
      })
      .catch(() =>
        import('./texts/about.en.json').then(m => setData(m.default))
      );

    return () => {
      active = false;
    };
  }, [lang]);

  if (!data) return <p>Loading...</p>;

  return (
    <>
      {data.intro.map((p, i) => <p key={i}>{p}</p>)}

      <p><b>{data.scenariosTitle}</b></p>

      <p>
        💻 <b>{data.admin.title}</b> {data.admin.text}
      </p>

      <p><b>{data.clientsTitle}</b></p>
      <p>{data.clientsIntro}</p>

      <ul>
        {data.clients.map((c, i) => (
          <li key={i}>
            💻 <b>{c.title}</b> {c.text}
          </li>
        ))}
      </ul>

      <p>{data.footer}</p>
    </>
  );
}

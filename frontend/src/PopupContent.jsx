import { useEffect, useState } from 'react';
import About from './assets/login_page_popups/About';

export default function PopupContent() {
  const [type, setType] = useState(null);
  const [lang, setLang] = useState('en');

  useEffect(() => {
    const popupHandler = (e) => setType(e.detail);
    const langHandler = (e) => setLang(e.detail);

    window.addEventListener('popup:open', popupHandler);
    window.addEventListener('lang:change', langHandler);

    return () => {
      window.removeEventListener('popup:open', popupHandler);
      window.removeEventListener('lang:change', langHandler);
    };
  }, []);

  if (!type) return null;

  switch (type) {
    case 'about':
      return <About lang={lang} />;
    default:
      return null;
  }
}

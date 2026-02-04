import { useEffect, useState } from 'react';
import About from './assets/login_page_popups/About';
import CreateCompetition from './assets/admin_page/CreateCompetition';

const POPUPS = {
  about: About,
  createCompetition: CreateCompetition,
};

export default function PopupContent() {
  const [type, setType] = useState(null);
  const [lang, setLang] = useState(window.appData.lang);

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

  const Component = POPUPS[type];
  if (!Component) return null;

  return <Component 
    mode = {type}
    lang = {lang} 
    onClose = {() => setType(null)} 
  />;
}

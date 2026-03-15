import { useEffect, useState } from 'react';
import MainPageImage from './assets/admin_page/MainPageImage';

const PAGES = {
  image: MainPageImage,
};

export default function PageContent() {
  const [type, setType] = useState(null);

  useEffect(() => {
    const imageHandler = (e) => setType(e.detail);
    const closeHandler = () => setType(null);

    window.addEventListener('image:open', imageHandler);
    window.addEventListener('image:close', closeHandler);

    return () => {
      window.removeEventListener('image:open', imageHandler);
      window.removeEventListener('image:close', closeHandler);
    };
  }, []);

  if (!type) return null;

  const Component = PAGES[type];
  if (!Component) return null;

  return <Component />;
};